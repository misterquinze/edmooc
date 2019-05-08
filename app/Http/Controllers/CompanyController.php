<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Company;
use App\Course;
use App\User;
use App\Category;

class CompanyController extends Controller
{
    public function getMyCourse(){
        $userLogin = Auth::user();
        $categories = Category::all();
        $company = Company::where('user_id',$userLogin->id)->first();
        $courses = Course::where('company_id',$company->id)->get();

        return view('dashboard/company/course',[
            'userLogin' => $userLogin,
            'categories' => $categories,
            'courses' => $courses,
        ]);
    }
    
    public function getEditCourseForm($id){
        $userLogin = Auth::user();
        $categories = Category::all();
        $course = Course::find($id);
        // dd('hello');

        return view('dashboard/company/course-edit',[
            'userLogin' => $userLogin,
            'categories' => $categories,
            'course' => $course,
        ]);
    }
    
    public function createCourse(Request $request){
        $userLogin = Auth::user();
        $company = Company::where('user_id',$userLogin->id)->first();

        $data = $request->all();
        
        $startDate = date('Y-m-d',strtotime($data['startDate']));
        $endDate = date('Y-m-d',strtotime($data['endDate']));
        // dd($data);
        if($data['type'] == 'free'){
            dd('word');

            $course = Course::create([
                'company_id' => $company->id,
                'category_id' => $data['category'],
                'name' => $data['name'],
                'description' => $data['description'],
                'type' => $data['type'],
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }else{
            //dd('hello');
            $course = Course::create([
                'company_id' => $company->id,
                'category_id' => $data['category'],
                'name' => $data['name'],
                'description' => $data['description'],
                'type' => $data['type'],
                'price' => $data['price'],
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }

        return back();
    }

    public function updateCourse(Request $request, $id){
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
        $course->start_date = $startDate;
        $course->end_date = $endDate;
        $course->save();

        return redirect('/dashboard/course/list');
    }

    public function deleteCourse($id){
        $course = Course::find($id);
        $course->delete();
        return redirect('/dashboard/course/list');
    }

    public function getRevenue(){
        $userLogin = Auth::user();
        
        return view('dashboard/company/revenue',[
            'userLogin' => $userLogin
        ]);
    }
}
