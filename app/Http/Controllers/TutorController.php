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
    public function getMyCourse(){
        $userLogin = Auth::user();
        $categories = Category::all();
        $company = Company::all();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();
        $courses = Course::where('tutor_id', $tutor->id)->get();

        return view('dashboard/tutor/course',[
            'userLogin' => $userLogin,
            'categories' => $categories,
            'company' => $company,
            'courses' => $courses
        ]);
    }

    public function getEditTopicForm($id){
        $userLogin = Auth::user();
        $categories = Category::all();
        $tutors = Tutor::all();
        $course = Course::find($id);


        return view('dashboard/tutor/topic-edit',[
            'userLogin' => $userLogin,
            'categories' => $categories,
            'tutors' => $tutors,
            'course' => $course,
        ]);
    }

    public function createTopic(Request $request, Course $course){
        $userLogin = Auth::user();
        $course = Course::where('id', $course->id)->first();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();
        $data = $request->all();
         
        $startDate = date('Y-m-d,',strtotime($data['startDate']));
        $endDate = date('Y-m-d',strtotime($data['endDate']));

        
            $topics = Topic::create([
                
                'course_id' => $course->id,
                'tutor_id' => $tutor->id,
                'name' => $data['name'],
                'week' => $data['week'],
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        
        
    
        return back();
    }

    public function updateTopic(Request $request, $id){
        $course = Course::find($id);
        $data = $request->all();

        $startDate = date('Y-m-d',strtotime($data['startDate']));
        $endDate = date('Y-m-d',strtotime($data['endDate']));

        $course->name = $data['name'];
        $course->description = $data['description'];
        if($data['type'] == 'paid'){
            $course->type = $data['type'];
            $course->price = $data['price'];
        }else{
            $course->type = $data['type'];
            $course->price = null;
        }
        $course->category_id = $data['category'];
        $course->tutor_id = $data['tutor'];
        $course->start_date = $startDate;
        $course->end_date = $endDate;
        $course->save();

        return redirect('/dashboard/course/list');
    }

    public function editTopic(){
        $userLogin = Auth::user();

        return view('dashboard/tutor/course',[
            'userLogin' => $userLogin
        ]);
    }

    public function deleteTopic($id){
        $course = Course::find($id);
        $course->delete();

        return redirect('/dashboard/company/course');
    }
}
