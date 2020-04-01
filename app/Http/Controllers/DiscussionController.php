<?php

namespace App\Http\Controllers;

use App\Course;
use App\Discussion;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($discId)
    {   
        $userLogin = Auth::user();
        $discussions = Discussion::findOrFail($discId);
        $discussions  = Discussion::where('id', $discussions->id)->first();
        $comment = Comment::where('commentable_id', $discussions->id)->get();
        

        //dd($comment);
        /** 
        if ($discussions->isEmpty()){
            \Session::flash('discussion', 'Dont have discussion');
        }else{
            foreach($discussions as $disc){
                $disc = Discussion::find($disc->id);
            }
        }
        */
        return view('classroom/discussion/discussion', [
            'userLogin' => $userLogin,
            'discussions' => $discussions,
            'comment' => $comment,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $courses, $id)
    {   
        $userLogin = Auth::user();
        $courses = Course::where('id', $id)->get();
        //$courses = Course::findOrFail($id);

        return view('classroom/discussion/create', compact('userLogin', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $courses, $id)
    {   
        
        $courses = Course::where('id', $id)->get();
        $courses = Course::findOrFail($id);
        $userLogin = Auth::user();
        $userLogin = User::where('id', $userLogin->id)->first();
        
        
        $data = $request->all();
        //dd($data);
        //dd($courses);
        //dd($userLogin);
        $discussions = Discussion::create([
                
            'user_id' => $userLogin->id,
            'course_id' => $courses->id,
            'title' => $data['title'],
            'content' => $data['content'],
        ]);    
        //dd($data);
        //dd($courses);
        //dd($discussions);
        $discussions->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy($contentId)
    {
        
    }

    public function addComment(Request $request, Discussion $disc)
    {
        $comment = New Comment;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;

        $disc->comments()->save($comment);
        
        return back()->withInfo('komentar terkirim!');
    }

    public function replyComment(Request $request, Comment $comment)
    {
        $reply = New Comment;
        $reply->user_id = Auth::user()->id;
        $reply->content = $request->content;

        $comment->comments()->save($reply);
        
        return back()->withInfo('komentar balasan terkirim!');
    }

    
}
