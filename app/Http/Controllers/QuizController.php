<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Tutor;
use App\Content;
use App\Topic;
use App\Course;

class QuizController extends Controller
{
    public function getQuizForm($courseId, $topicId){
        $userLogin = Auth::user();

        $topics = Topic::where('course_id', $courseId)->get();
        $topic = Topic::find($topicId);

        return view('dashboard/tutor/quiz/form',[
            'userLogin' => $userLogin,
            'topics' => $topics,
            'topic' => $topic,
        ]);
    }
}
