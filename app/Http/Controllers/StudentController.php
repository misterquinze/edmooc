<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Enrollment;
use App\UserCourse;

class StudentController extends Controller
{
    public function getFavorite(){
        $userLogin = Auth::user();

        return view('dashboard/student/favorite',[
            'userLogin' => $userLogin
        ]);
    }

    public function getMyCourse(){
        $userLogin = Auth::user();
        if (Auth::check()) {
            $enrollment = Enrollment::where('user_id', '=', Auth::id())
                                    ->get();
            $courses = [];
            foreach ($enrollment as $row) {
                $courses[] = $row->course;
            }
            $courses = collect($courses);
        } else {
            $courses = Course::all();
        }
        
        if ($courses->isEmpty()) {
            \Session::flash('course', 'Not enrolled to any courses');
        } else {
            foreach ($courses as $course) {
                $course = Course::find($course->id);
            }
        }

        return view('dashboard/student/course',[
            'userLogin' => $userLogin,
            'courses' => $courses,
        ]);
    }

    public function enroll(Course $course, $id)
    {   
        $course = Course::find($id);

        if (Auth::guest()) {
            return redirect(route('login'));
        }
        else{
            //dd('test');
            $enrollment = Enrollment::create([
                'user_id' => Auth::id(),
                'course_id' => $course->id,
                'status' => 0,
            ]);
            $enrollment->save();
        }
        //add enroll request to admin dashboard
        
        
        return redirect(route('dashboard/student/course/me' ));
    }

    public function unenroll(Course $course)
    {
        //detach record from user-course.
        UserCourse::where('user_id', '=', Auth::id())
                    ->where('course_id', '=', $course->id)
                    ->delete();
        \Session::flash('flash_message', 'You have been unenrolled from the course!');
        return redirect(route('dashboard/student/course'));
    }

    public function getTransaction(){
        $userLogin = Auth::user();
        
        return view('dashboard/student/transaction',[
            'userLogin' => $userLogin
        ]);
    }
}
