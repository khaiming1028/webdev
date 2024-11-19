<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;


class ForumController extends Controller
{
    public function viewForum(){

        $forums = Forum::all();
        return view('view-forum',['forums' => $forums]);
    }

    public function createForum()
    {

        $student = Auth::user()->student;
        if (!$student) {
            return redirect()->route('view.profile')->with('error', 'Please create a profile before posting on the forum.');
        }
        return view('forum-upload');


}

    public function show(Forum $forum)
{
    return view('forum-show', compact('forum'));
}

    public function storeForum(Request $request)
    {
        $student = Auth::user()->student;
        if (!$student) {
            return redirect()->route('view.profile')->with('error', 'Please create a profile before posting on the forum.');
        }

        // Create the forum post
        Forum::create([
            'forums_title' => $request->input('forums_title'),
            'forums_content' => $request->input('forums_content'),
            'student_id' => $student->id,
        ]);

        return redirect()->route('forum.view')->with('success', 'Post created successfully.');
    }

    public function editForum(Forum $forum)
    {
        if (Auth::user()->student->id !== $forum->student_id) {

            return redirect()->route('forum.view')->with('error', 'You are not authorized to edit this post.');
        }
        return view('edit-forum', ['forum' => $forum]);

}

    public function updateForum(Forum $forum, Request $request)
    {
       // Validation
    $data = $request->validate([
        'forums_title' => 'required|string|max:255',
        'forums_content' => 'required|string',
    ]);

    // Authorization (optional, if you use policies or manual checks)
    $student = Auth::user()?->student;
    if ($forum->student_id !== $student->id) {
        return redirect()->route('forum.view')->with('error', 'Unauthorized action.');
    }

    // Update the forum post
    $forum->update($data);

    return redirect()->route('forum.view')->with('success', 'Post updated successfully.');
    }

    public function destroyForum(Forum $forum)
{
    // Check if the logged-in student is the one who posted the forum
    if (Auth::user()->student->id !== $forum->student_id) {
        return redirect()->route('forum.view')->with('error', 'You are not authorized to delete this post.');
    }

    // Proceed with deletion
    $forum->delete();

    return redirect()->route('forum.view')->with('success', 'Post deleted successfully.');
}

}
