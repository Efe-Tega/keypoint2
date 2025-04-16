<?php

namespace App\Jobs;

use App\Models\TaskVideo;
use Carbon\Carbon;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProcessMediaUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $videoInputPath;
    protected string $videoOutputPath;
    protected string $videoFilename;

    protected string $imageInputPath;
    protected string $imageOutputPath;
    protected string $imageFilename;

    protected string $videoName;
    protected string $videoSummary;
    protected string $level;


    /**
     * Create a new job instance.
     */
    public function __construct(
        string $videoInputPath,
        string $videoOutputPath,
        string $videoFilename,
        string $imageInputPath,
        string $imageOutputPath,
        string $imageFilename,
        string $videoName,
        string $videoSummary,
        string $level,
    ) {
        $this->videoInputPath = $videoInputPath;
        $this->videoOutputPath = $videoOutputPath;
        $this->videoFilename = $videoFilename;

        $this->imageInputPath = $imageInputPath;
        $this->imageOutputPath = $imageOutputPath;
        $this->imageFilename = $imageFilename;

        $this->videoName = $videoName;
        $this->videoSummary = $videoSummary;
        $this->level = $level;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Compress and Upload video
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($this->videoInputPath);

        $format = new X264('aac', 'libx264');
        $format->setKiloBitrate(800);
        $format->setAudioCodec('aac');

        // Add additional parameters for iOS and streaming compatibility
        $format->setAdditionalParameters([
            '-profile:v',
            'baseline',       // Wider device support (older iPhones)
            '-level',
            '3.0',
            '-movflags',
            '+faststart'       // Ensures streaming starts quickly
        ]);

        $video->save($format, $this->videoOutputPath);

        $videoS3Path = 'uploads/videos/' . $this->videoFilename;
        Storage::disk('s3')->put($videoS3Path, file_get_contents($this->videoOutputPath));


        // === Compress and Upload Image ===
        $manager = new ImageManager(new Driver());
        $image = $manager->read($this->imageInputPath);
        $image->scale(width: 1280);
        $encodedImage = $image->toJpeg(75);

        file_put_contents($this->imageOutputPath, $encodedImage);

        $imageS3Path = 'uploads/images/' . $this->imageFilename;
        Storage::disk('s3')->put($imageS3Path, file_get_contents($this->imageOutputPath));

        // === Save to Database ===
        TaskVideo::insert([
            'movie_title' => $this->videoName,
            'summary' => $this->videoSummary,
            'level' => $this->level,
            'video_url' => $videoS3Path,
            'thumbnail' => $imageS3Path,
            'created_at' => Carbon::now(),
        ]);

        @unlink($this->videoInputPath);    // original
        @unlink($this->videoOutputPath);
        @unlink($this->imageInputPath);
        @unlink($this->imageOutputPath);
    }
}
