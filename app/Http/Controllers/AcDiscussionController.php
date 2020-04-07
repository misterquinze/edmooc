<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Ac_course;
use App\Ac_discussion;
use App\User;
use App\Ac_comment;

class AcDiscussionController extends Controller
{
    public function getForum(Ac_course $ac_course, $id)
    {
          $userLogin = Auth::user();
          $ac_course = Ac_course::where('id', $id)->first();
          $ac_discussion  = Ac_course::findOrFail($id)->ac_discussion()->get();
          $ac_topic = Ac_course::findOrFail($id)->ac_topic()->get();
     
          //dd( $ac_discussion);

          if ($ac_discussion->isEmpty()) {
          \Session::flash('discussion', 'Dont have discussion');
          } else {
               foreach($ac_discussion as $disc){
                $disc = Ac_discussion::find($disc->id);
               }
          }
          return view('classroom/ac/ac-forum', 
          compact('userLogin', 'ac_course', 'ac_discussion', 'ac_topic' ) );
    }

    public function searchDiscussion(Request $request, $id)
    {   
          $userLogin = Auth::user();
          
          $ac_course = Ac_course::where('id', $id)->first();
          $ac_discussion  = Ac_course::findOrFail($id)->ac_discussion()->get();
          $ac_topic = Ac_course::findOrFail($id)->ac_topic()->get();
          
          $search = $request->search;
          
          $ac_discussion = Ac_discussion::where('title', 'like', "%" .$search. "%")->paginate(5);
     
          //dd($ac_course);
          return view ('classroom/forum', [
               'userLogin' => $userLogin,
               'ac_course' => $ac_course,
               'ac_topic' => $ac_topic,
               'ac_discussion' => $ac_discussion
          ]);
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index($discId)
    {   
        $userLogin = Auth::user();
        $ac_discussion = Ac_discussion::findOrFail($discId);
        $ac_discussion  = Ac_discussion::where('id', $ac_discussion->id)->first();
        $ac_comment = Ac_comment::where('commentable_id', $ac_discussion->id)->get();
    
        return view('classroom/ac/discussion/discussion', [
           'userLogin' => $userLogin,
           'ac_discussion' => $ac_discussion,
           'ac_comment' => $ac_comment
        ]);
    }

    /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
    public function create(Ac_course $ac_course, $id)
    {   
        $userLogin = Auth::user();
        $ac_course = Ac_course::where('id', $id)->get();
        //$ac_course = Course::findOrFail($id);

        return view('classroom/discussion/create', compact('userLogin', 'courses'));
    }

    /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
    public function store(Request $request, Ac_course $ac_course, $id)
    {   
        
        $ac_course = Ac_course::where('id', $id)->get();
        $ac_course = Ac_course::findOrFail($id);
        $userLogin = Auth::user();
        $userLogin = User::where('id', $userLogin->id)->first();
        
        
        $data = $request->all();
        
        $ac_discussion = Ac_discussion::create([
                
            'user_id' => $userLogin->id,
            'ac_course_id' => $ac_course->id,
            'title' => $data['title'],
            'content' => $data['content'],
        ]);    
        //dd($data);
        //dd($ac_course);
        //dd($ac_discussion);
        $ac_discussion->save();

        return back();
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Ac_discussion  $discussion
        * @return \Illuminate\Http\Response
        */
    public function edit(Ac_discussion $discId)
    {
        $userLogin = Auth::user();
        
        $ac_discussion = Ac_discussion::find($discId);
        // dd('hello');

        return view('classroom/discussion/discussion-edit', [
            'userLogin' => $userLogin,
            'ac_discussion' => $ac_discussion,
            
        ]);
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\Discussion  $discussion
        * @return \Illuminate\Http\Response
        */
    public function update(Request $request, $discId)
    {
        $ac_discussion = Ac_discussion::findOrFail($discId);
        $data = $request->all();

        $ac_discussion->title = $data['title'];
        $ac_discussion->content = $data['content'];
        $ac_discussion->save();

        return back();
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Content  $discussion
        * @return \Illuminate\Http\Response
        */
    public function deleteDiscussion($discId)
    {
        $ac_discussion = Ac_discussion::findOrFail($discId);$ac_discussion->delete();

        return redirect('classroom/ac/discussion/ac-forum');
    }

    public function addComment(Request $request, Ac_discussion $disc)
    {
        $ac_comment = New Ac_comment;
        $ac_comment->user_id = Auth::user()->id;
        $ac_comment->content = $request->content;

        $disc->ac_comments()->save($ac_comment);
        
        return back()->withInfo('komentar terkirim!');
    }

    public function replyComment(Request $request, Ac_comment $comment)
    {
        $reply = New Ac_comment;
        $reply->user_id = Auth::user()->id;
        $reply->content = $request->content;

        $comment->ac_comments()->save($reply);
        
        return back()->withInfo('komentar balasan terkirim!');
    }

}
