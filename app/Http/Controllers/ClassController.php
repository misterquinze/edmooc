<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
   public function getOverview($id){
       return view('classroom/overview');
   }
   
   public function getTopic($id, $topicId){
       return view('classroom/topic');
   }
   
   public function getDiscussion($id){
       return view('classroom/discussion');
   }
  
   public function getTask($id){
       return view('classroom/task');
   }


}
