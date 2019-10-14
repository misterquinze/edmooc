<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Tutor;
use App\Topic;
use App\Course;
use App\Category;

class ClassController extends Controller
{
   public function getOverview($id ){
        $userLogin = Auth::user();
        
        $courses = Course::find($id);
        $courses = Course::where('id',$courses->id)->get();
        //$topics = Topic::find($topicId);
        //$topics = Topic::where('id',$topics->topicId)->get();

        return view('classroom/overview', [
            'userLogin' => $userLogin,
        
            'courses' => $courses,
            //'topics' => $topics
        ]);
   }
   
   public function getTopic($id, $topicId){
        $userLogin = Auth::user();
        $courses = Course::find($id);
        $courses = Course::where('id',$courses->id)->get();
        $topics = Topic::find($topicId);
        $topics = Topic::where('id',$topics->topicId)->get();


       return view('classroom/topic', [
            'userLogin' => $userLogin,
            'courses' => $courses,
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
