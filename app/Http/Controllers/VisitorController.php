<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Category;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function getHomepage(){
        $userLogin = Auth::user();

        return view('visitor/home',[
            'userLogin' => $userLogin
        ]);
    }

    public function getCourses(){
        $userLogin = Auth::user();
        $categories = Category::all();
        $courses = Course::all();
        $courses = Course::paginate(5);

        return view('visitor/course',[
            'userLogin' => $userLogin,
            'categories' => $categories,
            'courses' => $courses,
        ]);
    }

    public function getCoursePreview($id){
        $userLogin = Auth::user();
        $courses = Course::findOrFail($id);
        $courses = Course::where('id', $courses->id)->get();
        
        //dd($courses);

        return view('visitor/preview',[
            'userLogin' => $userLogin,
            'courses' => $courses,
        ]);
    }

    public function getAbout(){
        $userLogin = Auth::user();

        return view('visitor/about',[
            'userLogin' => $userLogin,
            
        ]);
    }

    public function getContact(){
        $userLogin = Auth::user();

        return view('visitor/contact',[
            'userLogin' => $userLogin,
            
        ]);
    }

    public function filter(Request $request){
        $course = Course::all();
        if($request->type){
            $course = $course->where('type', $request->type);
        }

        return $course;

    }
}
