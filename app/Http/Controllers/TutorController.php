<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Tutor;
use App\Course;
use App\Company;
use App\Category;
use App\Topic;
use App\Content;

class TutorController extends Controller
{
    public function getMyCourse(){
        $userLogin = Auth::user();
        $categories = Category::all();
        $company = Company::all();
        $topics = Topic::all();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();
        $courses = Course::where('tutor_id', $tutor->id)->get();

        if ($courses->isEmpty()) {
            \Session::flash('course', 'Dont have course to teach');
        } else {
            foreach ($courses as $course) {
                $course = Course::find($course->id);
            }
        }

        return view('dashboard/tutor/course', compact(
            'userLogin', 
            'categories', 
            'company', 
            'topic', 
            'courses', 
            'contents'));
    }
    

    // Topik
    public function getTopicList($id){
        $userLogin = Auth::user();
        $course = Course::where('id', $id)->first();
        $topics = Course::findOrFail($id)->topics()->get();
        $discussions = Course::findOrFail($id)->discussions()->get();

        return view('dashboard/tutor/topic/list', [
             'userLogin' => $userLogin, 
             'course' => $course, 
             'topics' => $topics, 
             'discussions' => $discussions
        ]);
    }

    public function createTopic(Request $request, Course $courses, $id){
        $courses = Course::where('id', $courses->id)->get();
        $courses = Course::findOrFail($id);
        $userLogin = Auth::user();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();

        $data = $request->all();

        $topics = Topic::create([        
            'course_id' => $courses->id,
            'tutor_id' => $tutor->id,
            'name' => $data['name'],
            'description' => $data['description'],    
        ]);
        $topics->save();

        return back();
    }

    public function updateTopic(Request $request, $topicId){
        $topics = Topic::findOrFail($topicId);
        $data = $request->all();

        $topics->name = $data['name'];
        $topics->description = $data['description'];
        $topics->save();

        return back();
    }

    public function deleteTopic($id){
        $topics = Topic::findOrFail($id);
        $topics->delete();

        return back();
    }


    // Content
    public function getContentList($topicId){
        $userLogin = Auth::user();
        $topic = Topic::findOrFail($topicId);
        $topic = Topic::where('id', $topic->id)->first();
        $contents = Content::where('topic_id', $topic->id)->get();

        if ($contents->isEmpty()) {
            \Session::flash('content', 'Dont have content');
        }else {
            foreach($contents as $content){
                $content = Content::find($content->id);
            }
        }

        return view('dashboard/tutor/content/list', [
            'userLogin' => $userLogin,
            'topic' => $topic,
            'contents' => $contents
        ]);
    }

    public function createContentForm($topicId){   
        $userLogin = Auth::user();
        $topics = Topic::where('id', $topicId)->get();
        return view('dashboard/tutor/content/form-create', compact('userLogin', 'topics'));
    }

    public function storeContent(Request $request, $topicId){   
        $topics = Topic::where('id', $topicId)->get();
        $topics = Topic::findOrFail($topicId);
        $userLogin = Auth::user();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();
        
        $data = $request->all();
        //dd($data);

        if($data['type'] == 'video'){
            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' => $data['source']
                
            ]);
        }elseif($data['type'] == 'artikel'){
            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' => $data['source']
                
            ]);
        }else{
            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' => $data['source']
                
            ]);
        }
        
        $contents->save();
        $topics = Topic::where('id', $topicId)->first();
        $contentsData = Content::where('topic_id', $topics->id)->get();

        if ($contentsData->isEmpty()) {
            \Session::flash('content', 'Dont have content');
        }else {
            foreach($contentsData as $content){
                $content = Content::find($content->id);
            }
        }

        $contents = Content::where('topic_id', $topics->id)->get();
        
        return redirect()->route('tutor.content.index', [$topics->id]);
    }


    // Kuis
    public function getQuizDetail($topicId){
        $userLogin = Auth::user();
        $topic = Topic::findOrFail($topicId);
        $topic = Topic::where('id', $topic->id)->first();
        
        return view('dashboard/tutor/quiz/detail', [
            'userLogin' => $userLogin,
            'topic' => $topic
        ]);
    }

    public function getQuizForm($topicId){
        $userLogin = Auth::user();
        $topic = Topic::find($topicId);

        $topics = Topic::where('course_id', $topic->course->id)->get();

        return view('dashboard/tutor/quiz/form-create',[
            'userLogin' => $userLogin,
            'topics' => $topics,
            'topic' => $topic,
        ]);
    }

    public function getAnswerList($quizId){
        $userLogin = Auth::user();
        
        return view('dashboard/tutor/quiz/answer-list',[
            'userLogin' => $userLogin
        ]);
    }
}
