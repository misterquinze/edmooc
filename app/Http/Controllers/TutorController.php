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
        return view ('dashboard/tutor/topic-edit', [
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
         
        $startDate = date('Y-m-d,',strtotime($data['startDate']));
        $endDate = date('Y-m-d',strtotime($data['endDate']));
        //dd($data);
        if ($data['week'] == '1'){
            //dd('hello');
            $topics = Topic::create([
                
                'course_id' => $courses->id,
                'tutor_id' => $tutor->id,
                'name' => $data['name'],
                'week' => $data['week'],
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        } else {
            $topics = Topic::create([
                
                'course_id' => $courses->id,
                'tutor_id' => $tutor->id,
                'name' => $data['name'],
                'week' => $data['week'],
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }
        $topics->save();
        return back();
    }

    public function updateTopic(Request $request, $topicId){
        $topics = Topic::findOrFail($topicId);
        $data = $request->all();

        $startDate = date('Y-m-d',strtotime($data['startDate']));
        $endDate = date('Y-m-d',strtotime($data['endDate']));

        $topics->name = $data['name'];
        
        $topics->start_date = $startDate;
        $topics->end_date = $endDate;
        $topics->save();

        return redirect('/dashboard/topic/topic-edit');
    }


    public function deleteTopic($id){
        $topics = Topic::findOrFail($id);
        $topics->delete();

        return redirect('/classroom/{id}/overview');
    }
}
