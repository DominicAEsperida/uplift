<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
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
                'id' => $comment->id,
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

    public function editContent(Request $request){
        $content = $request->input('content');
        $content_id = $request->input('content-id');

        DB::table('threads')->where('id', $content_id)->update(['content'=>$content]);

        return redirect()->back();
    }

    public function deleteContent(Request $request){

        DB::table('threads')->where('id', $request->input("content-id"))->delete();

        return redirect('forums');
    }

    public function editComment(Request $request){
        $comment = $request->input('comment');
        $comment_id = $request->input('comment-id');

        DB::table('comments')->where('id', $comment_id)->update(['comment'=>$comment]);

        return redirect()->back();
    }

    public function deleteComment(Request $request){

        DB::table('comments')->where('id', $request->input("comment-id"))->delete();

        return redirect()->back();
    }

    public function index()
    {
        // if (Auth::user() == null) {
        //     return view('auth.login');
        // }

        $model = DB::table('threads')
            ->join('users', 'users.id', '=', 'threads.user_id')
            ->select('users.*', 'threads.*')
            ->get();
        
        return view('forums')->with('listOfThreads', $model);
    }
}
