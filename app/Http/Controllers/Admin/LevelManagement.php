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
        $levels = Level::latest()->get();
        return view('admin.level.index', compact('levels'));
    }

    public function addLevel(Request $request)
    {
        $request->validate([
            'level' => 'required|string',
            'level_amount' => 'required'
        ]);

        Level::insert([
            'level' => $request->level,
            'amount' => $request->level_amount,
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
            'level_amount' => 'required'
        ]);

        Level::findOrFail($id)->update([
            'level' => $request->level,
            'amount' => $request->level_amount
        ]);

        return redirect()->back()->with('success', 'Level Updated Successfully');
    }

    public function destroyLevel($id)
    {
        Level::find($id)->delete();
        return redirect()->back();
    }
}
