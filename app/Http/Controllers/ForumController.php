<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;

//doms
class ForumController extends Controller
{
    public function postThread(Request $request) 
    {
        $heading = $request->input('heading');
        $content = $request->input('content');

        Thread::create([
            'user_id' => Auth::user()->id,
            'heading' => $heading,
            'content' => $content
        ]);

        Session::flash('success', 'Successfully posted a thread!');
        return redirect()->back();
    }

    public function viewContent($id) 
    {
        $thread = DB::table('threads')->where('id', $id)->first();
        $listOfComments = DB::table('comments')->where('thread_post_id', $id)->get();

        $model = array();
        foreach ($listOfComments as $comment) {
            $item = [
                'author' => DB::table('users')->where('id', $comment->user_id)->first()->name,
                'comment' => $comment->comment
            ];
            array_push($model, $item);
        }
        
        $author = DB::table('users')->where('id', $thread->user_id)->first()->name;

        return view('content')->with(['content' => $thread, 'author' => $author])->with('comments', $model);
    }

    public function postComment(Request $request) 
    {
        $comment = $request->input('comment');
        $thread_id = $request->input('thread_id');

        Comment::create([
            'user_id' => Auth::user()->id,
            'thread_post_id' => $thread_id,
            'comment' => $comment
        ]);
        
        Session::flash('success', 'Successfully posted a thread!');
        return redirect()->back();
    }

    public function index()
    {
        // if (Auth::user() == null) {
        //     return view('auth.login');
        // }

        $model = DB::table('threads')->get();
        
        return view('forums')->with('listOfThreads', $model);
    }
}
