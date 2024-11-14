<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;


class ForumController extends Controller
{
    public function viewForum(){
        
        $forums = Forum::all();
        return view('view-forum',['forums' => $forums]);
    }

    public function createForum()
    {
        return view('forum-upload');
    }

    public function storeForum(Request $request)
    {

        $data = $request ->validate([
            'forums_title' => 'required',
            'forums_content' => 'required',
        
        ]);
        

          //save to database   
          $newforum = Forum::create($data);
          return redirect(route('forum.view'));
    }

    public function editForum(Forum $forum)
    {
        return view('edit-forum',['forum' => $forum]);  
    }

    public function updateForum(Forum $forum, Request $request)
    {
        $data = $request ->validate([
            'forums_title' => 'required',
            'forums_content' => 'required',
        
        ]);
        

        $forum->update($data);
        return redirect(route('forum.view'))->with('Update Succesful');
    }

    public function destroyForum(Forum $forum)
    {
        $forum->delete(); 
        return redirect(route('forum.view'))->with('Delete Succesful');

    }

}
