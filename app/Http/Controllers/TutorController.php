<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Tutor;
use App\Course;
use App\Company;
use App\Category;
use App\Topic;


class TutorController extends Controller
{
    public function getMyCourse()
    {
        $userLogin = Auth::user();
        $categories = Category::all();
        $company = Company::all();
        $topics = Topic::all();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();
        $courses = Course::where('tutor_id', $tutor->id)->get();

        //dd($courses);
        //dd($tutor);

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

    public function getEditTopicForm($topicId){
        $userLogin = Auth::user();
        $courses = Course::all();
        $topics = Topic::findOrFail($topicId)->first();
        $topics = Topic::where('id', $topics->id)->get();
        
        
        //dd($topics);
        return view ('classroom/topic/topic-edit', [
            'userLogin' => $userLogin,
            'courses' => $courses,
            'topics' => $topics
        ]);
    }

    public function createTopic(Request $request, Course $courses, $id)
    {
        
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
        //dd($data);
       
        $topics->save();
        return back();
    }

    public function updateTopic(Request $request, $topicId){
        $topics = Topic::findOrFail($topicId);
        $data = $request->all();

        $topics->name = $data['name'];
        $topics->description = $data['description'];
        $topics->save();

        return redirect('/classroom/overview');
    }


    public function deleteTopic($id){
        $topics = Topic::findOrFail($id);
        $topics->delete();

        return redirect('/classroom/overview');
    }
}
