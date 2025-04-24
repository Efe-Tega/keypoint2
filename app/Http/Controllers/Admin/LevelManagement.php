<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LevelManagement extends Controller
{
    public function viewLevel()
    {
        $levels = Level::oldest()->get();
        return view('admin.level.index', compact('levels'));
    }

    public function addLevel(Request $request)
    {
        $request->validate([
            'level' => 'required|string',
            'upgrade_amount' => 'required',
            'reward_amount' => 'required',
            'daily_task' => 'required|integer'
        ]);

        Level::insert([
            'level' => $request->level,
            'upgrade_amount' => $request->upgrade_amount,
            'reward_amount' => $request->reward_amount,
            'daily_task' => $request->daily_task,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Level Addedd Successfully');
    }

    public function editLevel($id)
    {
        $level = Level::find($id);
        return view('admin.level.edit-modal', compact('level'));
    }

    public function updateLevel(Request $request, $id)
    {
        $request->validate([
            'level' => 'required|string',
            'upgrade_amount' => 'required',
            'reward_amount' => 'required',
            'daily_task' => 'required|integer'
        ]);

        Level::findOrFail($id)->update([
            'level' => $request->level,
            'upgrade_amount' => $request->upgrade_amount,
            'reward_amount' => $request->reward_amount,
            'daily_task' => $request->daily_task,
        ]);

        return redirect()->back()->with('success', 'Level Updated Successfully');
    }

    public function destroyLevel($id)
    {
        Level::find($id)->delete();
        return redirect()->back();
    }
}
