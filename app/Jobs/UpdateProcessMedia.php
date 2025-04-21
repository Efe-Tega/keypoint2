<?php

namespace App\Jobs;

use App\Models\TaskVideo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UpdateProcessMedia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $imageInputPath;
    protected string $imageOutputPath;
    protected string $imageFilename;

    protected string $movieTitle;
    protected string $movieSummary;
    protected string $level;

    protected string $slug;
    protected string $taskId;


    /**
     * Create a new job instance.
     */
    public function __construct(
        string $imageInputPath,
        string $imageOutputPath,
        string $imageFilename,
        string $movieTitle,
        string $movieSummary,
        string $level,
        string $slug,
        string $taskId,
    ) {
        $this->imageInputPath = $imageInputPath;
        $this->imageOutputPath = $imageOutputPath;
        $this->imageFilename = $imageFilename;

        $this->movieTitle = $movieTitle;
        $this->movieSummary = $movieSummary;
        $this->level = $level;

        $this->slug = $slug;
        $this->taskId = $taskId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // === Compress and Upload Image ===
        $manager = new ImageManager(new Driver());
        $image = $manager->read($this->imageInputPath);
        $image->scale(width: 1280);
        $encodedImage = $image->toJpeg(75);

        file_put_contents($this->imageOutputPath, $encodedImage);

        $imageS3Path = 'uploads/images/' . $this->imageFilename;
        Storage::disk('s3')->put($imageS3Path, file_get_contents($this->imageOutputPath));

        // === Save to Database
        TaskVideo::findOrFail($this->taskId)->update([
            'movie_title' => $this->movieTitle,
            'slug' => $this->slug,
            'summary' => $this->movieSummary,
            'level_id' => $this->level,
            'thumbnail' => $imageS3Path,
        ]);

        @unlink($this->imageInputPath);
        @unlink($this->imageOutputPath);
    }
}
