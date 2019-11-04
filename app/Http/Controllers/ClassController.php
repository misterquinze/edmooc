<?php

namespace App\Http\Controllers;
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
   
   public function getTopic($id){
        $userLogin = Auth::user();
        //$topics = Topic::all();
        $topics = Topic::findOrFail($id);
        $topics = Topic::where('id', $topics->id)->get();


       return view('classroom/topic', [
            'userLogin' => $userLogin,
            
            'topics' => $topics
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
