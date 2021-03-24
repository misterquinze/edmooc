<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Company;
use App\Course;
use App\Ac_course;
use App\Category;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function getHomepage()
    {
        $userLogin = Auth::user();

        return view('visitor/home',[
            'userLogin' => $userLogin
        ]);
    }

    public function getCourses()
    {
        $userLogin = Auth::user();
        $categories = Category::all();
        
        $courses = Course::paginate(5);
       
        $accourse = Ac_course::paginate(5);

        return view('visitor/course',[
            'userLogin' => $userLogin,
            'categories' => $categories,
            'courses' => $courses,
            'accourse' => $accourse
        ]);
    }

    public function getProgram()
    {
        $userLogin = Auth::user();
        $categories = Category::all();
        $companies = Company::all();
        $program = Program::paginate(5);
        $accourse = Ac_course::paginate(5);

        return view('visitor/program',[
            'userLogin' => $userLogin,
            'categories' => $categories,
            'companies' => $companies,
            'program' => $program,
            'accourse' => $accourse
        ]);
    }

    public function getCoursePreview($id)
    {
        $userLogin = Auth::user();
        $courses = Course::findOrFail($id);
        $courses = Course::where('id', $courses->id)->get();
        
        //dd($courses);

        return view('visitor/preview',[
            'userLogin' => $userLogin,
            'courses' => $courses,
        ]);
    }

    public function getAcCoursePreview($id)
    {
        $userLogin = Auth::user();
       
        $accourse = Ac_course::findOrFail($id);
        $accourse =  Ac_course::where('id', $accourse->id)->get();
        //dd($courses);

        return view('visitor/preview-ac',[
            'userLogin' => $userLogin,
            'accourse' => $accourse
        ]);
    }



    public function getAbout()
    {
        $userLogin = Auth::user();

        return view('visitor/about',[
            'userLogin' => $userLogin,
            
        ]);
    }

    public function getContact()
    {
        $userLogin = Auth::user();

        return view('visitor/contact',[
            'userLogin' => $userLogin,
            
        ]);
    }

    public function filter(Request $request)
    {
        $course = Course::all();
        if($request->type){
            $course = $course->where('type', $request->type);
        }

        return $course;

    }

    public function search(Request $request)
    {   
        $userLogin = Auth::user();
        
        $search = $request->search;
        $categories = Category::all();
        $courses = Course::where('name', 'like', "%" .$search. "%")->paginate();
        $accourse = Ac_course::where('name', 'like', "%" .$search. "%")->paginate();
        

        //dd($courses);
        return view('visitor/course', [
            'userLogin' => $userLogin,
            'categories' => $categories,
            'courses' => $courses,
            'accourse' => $accourse
        ]);
    }
    
}
