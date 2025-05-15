<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MessageNotification as ModelsMessageNotification;
use App\Models\UserMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageNotification extends Controller
{
    public function viewMessage()
    {
        $generalMsg = ModelsMessageNotification::where('type', 'general')->get();
        $definedMessages = ModelsMessageNotification::where('type', 'specific')->get();
        return view('admin.notification.index', compact('definedMessages', 'generalMsg'));
    }

    public function addMessage()
    {
        return view('admin.notification.add-message');
    }

    public function uploadMessage(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required',
            'content' => 'required|string',
        ], [
            'title.required' => 'Title cannot be left empty',
            'content.required' => 'Please enter some message'
        ]);

        $notification = new ModelsMessageNotification();
        $notification->title = $request->title;
        $notification->type = $request->type;
        $notification->content = $request->content;
        $notification->created_at = Carbon::now();
        $notification->save();

        $success = array(
            'message' => 'Message notification added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.message')->with($success);
    }

    public function editMessage(Request $request, $id)
    {
        $msg = ModelsMessageNotification::findOrFail($id);
        return view('admin.notification.edit-message', compact('msg'));
    }

    public function updateMessage(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required',
            'content' => 'required|string',
        ], [
            'title.required' => 'Title cannot be left empty',
            'content.required' => 'Please enter some message'
        ]);

        $id = $request->id;
        ModelsMessageNotification::findOrFail($id)->update([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'Message notification updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.message')->with($notification);
    }

    public function openMessage(Request $request, $id)
    {

        $detail = ModelsMessageNotification::findOrFail($id);
        return view('admin.notification.display-message', compact('detail'));
    }

    public function sendNotification(Request $request, $id)
    {
        UserMessage::insert([
            'message_notification_id' => $id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Message has been sent to all users',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteMessage(Request $request, $id)
    {
        ModelsMessageNotification::find($id)->delete();

        return redirect()->back();
    }
}
