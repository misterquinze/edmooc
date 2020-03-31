<?php

namespace App\Http\Controllers;

use App\Content;
use App\Topic;
use App\Course;
use App\Tutor;

use App\Discussion;
use App\Comments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




class ClassController extends Controller
{
   public function getOverview(Course $courses, $id){
          
          $userLogin = Auth::user();
          $course = Course::where('id', $id)->first();
          $topics = Course::findOrFail($id)->topics()->get();
          $discussions = Course::findOrFail($id)->discussions()->get();

          return view('classroom/overview', [
               'userLogin' => $userLogin, 
               'course' => $course, 
               'topics' => $topics, 
               'discussions' => $discussions
          ]);
     }
   
     public function getTopic(Topic $topics, $topicId){
          $userLogin = Auth::user();
          //$courses = Course::findOrFail($id)->topics()->get();
         
          //$tops = Topic::findOrFail($topicId);
          //$tops = Topic::where('id', $tops->id)->get();
          $topics = Topic::findOrFail($topicId);
          $topics = Topic::where('id', $topics->id)->first();
          //$contents = Topic::findOrFail($topicId)->contents()->get();
          //$contents = Content::all();
          $contents = Content::where('topic_id', $topics->id)->get();
          //dd($courses);
          //dd($contents);
          //dd($topics);

          if ($contents->isEmpty()) {
               \Session::flash('content', 'Dont have content');
          }else {
               foreach($contents as $content){
                    $content = Content::find($content->id);
               }
          }

          return view('classroom/topic/topic', [
               'userLogin' => $userLogin,
               'topics' => $topics,
               'contents' => $contents
               //'courses' => $courses
               //'topicId' => $topicId
          ]);
       
     }
   
   public function getForum(Course $courses, $id)
     {
          $userLogin = Auth::user();
          $courses = Course::where('id', $id)->first();
          $discussions  = Course::findOrFail($id)->discussions()->get();
          $topics = Course::findOrFail($id)->topics()->get();
     
          //dd( $discussions);

          if ($discussions->isEmpty()) {
          \Session::flash('discussion', 'Dont have discussion');
          } else {
               foreach($discussions as $disc){
              $disc = Discussion::find($disc->id);
               }
          }
          return view('classroom/forum', 
          compact('userLogin', 'courses', 'discussions', 'topics' ) );
     }
  
   public function getTask($id)
   {
       $userLogin = Auth::user();

       return view('classroom/task', [
            'userLogin' => $userLogin,
       ]);
   }

   public function searchDiscussion(Request $request, $id)
   {   
          $userLogin = Auth::user();
          
          $courses = Course::where('id', $id)->first();
          $discussions  = Course::findOrFail($id)->discussions()->get();
          $topics = Course::findOrFail($id)->topics()->get();
          
          $search = $request->search;
          
          $discussions = Discussion::where('title', 'like', "%" .$search. "%")->paginate(5);
     
          //dd($courses);
          return view ('classroom/forum', [
               'userLogin' => $userLogin,
               'courses' => $courses,
               'topics' => $topics,
               'discussions' => $discussions
          ]);
     }


}
