<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CompressVideo;
use FFMpeg\Format\Video\X264;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoManagement extends Controller
{
    public function addVideo(Request $request)
    {
        return view('admin.video.add-video');
    }

    // public function postVideo(Request $request)
    // {
    //     if ($request->hasFile('uploadMe')) {

    //         // $fileName = $request->file("uploadMe")->getClientOriginalExtension();

    //         // $request->file('uploadMe')->store('uploads', [
    //         //     "disk" => "s3",
    //         //     "visibility" => "private"
    //         // ]);


    //         $video = $request->file('uploadMe');
    //         $filename = uniqid() . '.' . $video->getClientOriginalExtension();
    //         $tempPath = $video->storeAs('videos', $filename, 'public'); // stores in storage/app/public/videos

    //         // Path to input and output
    //         $inputPath = storage_path('app/public/' . $tempPath);
    //         $compressedFilename = 'compressed_' . $filename;
    //         $outputPath = storage_path('app/public/compress/' . $compressedFilename);

    //         CompressVideo::dispatch($inputPath, $outputPath);

    //         return back()->with('success', 'Video uploaded and compressed!')
    //             ->with('path', 'videos/compressed/' . $compressedFilename);
    //     }

    //     return redirect()->back()->with('success', 'video uploaded');
    // }

    public function postVideo(Request $request)
    {


        if ($request->hasFile('uploadMe')) {
            $video = $request->file('uploadMe');

            $filename = uniqid() . '.' . $video->getClientOriginalExtension();
            $tempPath = $video->storeAs('videos', $filename, 'public');

            $inputPath = storage_path('app/public/' . $tempPath);
            $compressedFilename = 'compressed_' . $filename;
            $outputPath = storage_path('app/public/compress/' . $compressedFilename);

            CompressVideo::dispatch($inputPath, $outputPath, $compressedFilename);

            return response()->json([
                "status" => "success",
                "redirect" => route('add.video', ['message' => 'Video uploaded successfully!']),
            ]);
        }

        return redirect()->back()->with('error', 'No videos were uploaded.');
    }
}
