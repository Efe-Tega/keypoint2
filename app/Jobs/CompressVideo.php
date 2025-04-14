<?php

namespace App\Jobs;

use App\Models\TaskVideo;
use Carbon\Carbon;
use FFMpeg\Format\Video\X264;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompressVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $inputPath;
    public string $outputPath;
    public string $filename;


    /**
     * Create a new job instance.
     */
    public function __construct(string $inputPath,  string $outputPath, $filename)
    {
        $this->inputPath = $inputPath;
        $this->outputPath = $outputPath;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ffmpeg = \FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($this->inputPath);

        $format = new X264('libmp3lame', 'libx264');
        $format->setKiloBitrate(800);

        $video->save($format, $this->outputPath);

        // Upload to S3
        $s3Path = 'uploads/' . $this->filename;
        Storage::disk('s3')->put($s3Path, file_get_contents($this->outputPath));

        // Save to DB
        TaskVideo::insert([
            'video_url' => 'uploads/' . $this->filename,
            'created_at' => Carbon::now(),
        ]);

        // Delete both files
        @unlink($this->inputPath);    // original
        @unlink($this->outputPath);   // compressed (optional if already uploaded)
    }
}
