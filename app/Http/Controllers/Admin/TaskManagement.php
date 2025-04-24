<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessMediaUpload;
use App\Jobs\UpdateProcessMedia;
use App\Models\Level;
use App\Models\TaskVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskManagement extends Controller
{
    public function viewTask(Request $request)
    {
        $levels = Level::latest()->get();
        return view('admin.task.index', compact('levels'));
    }

    public function getTask(Request $request)
    {
        $levelId = $request->level_id;
        $tasks = TaskVideo::where('level_id', $levelId)->get();
        $levels = Level::latest()->get();

        return view('admin.task.index', compact('tasks', 'levels'));
    }

    public function addTask(Request $request)
    {
        $levels = Level::all();
        return view('admin.task.add-task', compact('levels'));
    }

    public function editTask(Request $request, $id)
    {
        $task = TaskVideo::findOrFail($id);
        $levels = Level::latest()->get();
        return view('admin.task.edit-task', compact('task', 'levels'));
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
            'level_id' => 'required',
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
            $request->level_id,
            $request->slug
        );

        return redirect()->back()->with('success', 'Task Uploaded Successfully');

        // return response()->json([
        //     "status" => "success",
        //     "redirect" => route('add.video', ['message' => 'Task uploaded successfully!']),
        // ]);
    }

    public function updateTask(Request $request)
    {
        // $request->validate([
        //     'movie_title' => 'required|string',
        //     'level_id' => 'required',
        //     'imgUpload' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        //     'summary' => 'required|string',
        // ]);

        $slug = $request->slug;

        if ($request->hasFile('imgUpload')) {
            // === Handle Image ===
            $image = $request->file('imgUpload');
            $imageFilename = $slug . '.' . $image->getClientOriginalExtension();
            $imageTempPath = $image->storeAs('images', $imageFilename, 'public');

            $imageInputPath = storage_path('app/public/' . $imageTempPath);
            $imageCompressedFilename = 'compressed_' . $imageFilename;
            $imageOutputPath = storage_path('app/public/compress/' . $imageCompressedFilename);

            UpdateProcessMedia::dispatch(
                $imageInputPath,
                $imageOutputPath,
                $imageCompressedFilename,
                $request->movie_title,
                $request->summary ?? '',
                $request->level_id,
                $request->slug,
                $request->task_id
            );

            return redirect()->back()->with('success', 'Task Uploaded With Thumbnail Successfully');
        } else {
            $taskId = $request->task_id;
            // === Save to Database
            TaskVideo::findOrFail($taskId)->update([
                'movie_title' => $request->movie_title,
                'slug' => $request->slug,
                'summary' => $request->summary,
                'level_id' => $request->level_id,
            ]);

            return redirect()->back()->with('success', 'Task Uploaded Successfully');
        }
    }

    public function deleteTask($id)
    {
        $task = TaskVideo::findOrFail($id);

        // === Delete video from s3 ===
        if ($task->video_url && Storage::disk('s3')->exists($task->video_url)) {
            Storage::disk('s3')->delete($task->video_url);
        }

        // === Delete thumbnail from S3 ===
        if ($task->thumbnail && Storage::disk('s3')->exists($task->thumbnail)) {
            Storage::disk('s3')->delete($task->thumbnail);
        }

        // === Delete record from database ===
        $task->delete();

        return redirect()->back();
    }
}
