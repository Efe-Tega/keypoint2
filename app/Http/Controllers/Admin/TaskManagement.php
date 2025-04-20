<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessMediaUpload;
use Illuminate\Http\Request;

class TaskManagement extends Controller
{
    public function addTask(Request $request)
    {
        return view('admin.task.add-task');
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

    public function postTask(Request $request)
    {

        $request->validate([
            'movie_title' => 'required|string',
            'level' => 'required',
            'imgUpload' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'uploadMe' => 'required',
            'summary' => 'required|string',
        ]);

        $slug = $request->slug;

        // Handle Video
        $video = $request->file('uploadMe');

        $filename = $slug . '.' . $video->getClientOriginalExtension();
        $tempPath = $video->storeAs('videos', $filename, 'public');

        $videoInputPath = storage_path('app/public/' . $tempPath);
        $videoCompressedFilename = 'compressed_' . $filename;
        $videoOutputPath = storage_path('app/public/compress/' . $videoCompressedFilename);

        // CompressVideo::dispatch($videoInputPath, $videoOutputPath, $compressedFilename);


        // === Handle Image ===
        $image = $request->file('imgUpload');
        $imageFilename = $slug . '.' . $image->getClientOriginalExtension();
        $imageTempPath = $image->storeAs('images', $imageFilename, 'public');

        $imageInputPath = storage_path('app/public/' . $imageTempPath);
        $imageCompressedFilename = 'compressed_' . $imageFilename;
        $imageOutputPath = storage_path('app/public/compress/' . $imageCompressedFilename);

        // CompressImage::dispatch($imageInputPath, $imageOutputPath, $imageCompressedFilename);

        // === Dispatch Job ===
        ProcessMediaUpload::dispatch(
            $videoInputPath,
            $videoOutputPath,
            $videoCompressedFilename,
            $imageInputPath,
            $imageOutputPath,
            $imageCompressedFilename,
            $request->movie_title,
            $request->summary ?? '',
            $request->level
        );

        return redirect()->back()->with('success', 'Task Uploaded Successfully');

        // return response()->json([
        //     "status" => "success",
        //     "redirect" => route('add.video', ['message' => 'Task uploaded successfully!']),
        // ]);
    }
}
