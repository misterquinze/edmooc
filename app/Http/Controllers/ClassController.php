<?php

namespace App\Http\Controllers;

use App\Content;
use App\Topic;
use App\Course;
use App\Tutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




class ClassController extends Controller
{
   public function getOverview(Course $courses, $id){
          
          $userLogin = Auth::user();
          $courses = Course::where('id', $id)->get();
          $topics = Course::findOrFail($id)->topics()->get();
          

          //$topics = Topic::where('course_id', $courses->id)->first();
          //$topics = Course::find($id)->topics;
          //dd($courses);
          //dd($topics);
          
          //dd($courses->topics->id);

          return view('classroom/overview', 
          compact('userLogin', 'courses', 'topics') );
     }
   
   public function getTopic($topicId){
          $userLogin = Auth::user();
          //$courses = Course::findOrFail($id)->topics()->get();
          $topics = Topic::findOrFail($topicId);
          $topics = Topic::where('id', $topics->id)->get();
          //$courses = Topic::findOrFail($id)->courses()->get();
          //$topics = Topic::findOrFail($topicId)->get();
          $contents = Content::all();
          //dd($courses);
          //dd($contents);

          if ($contents->isEmpty()) {
               \Session::flash('content', 'Dont have content');
          }else {
               foreach($contents as $content){
                    $content = Content::find($content->id);
               }
          }

       return view('classroom/topic', [
            'userLogin' => $userLogin,
            'topics' => $topics,
            'contents' => $contents
            //'courses' => $courses
            //'topicId' => $topicId
       ]);
       
   }
   
   public function getDiscussion($id){
       $userLogin = Auth::user();


       return view('classroom/discussion',[
            'userLogin' => $userLogin,
       ]);
   }
  
   public function getTask($id){
       $userLogin = Auth::user();

       return view('classroom/task', [
            'userLogin' => $userLogin,
       ]);
   }


}
