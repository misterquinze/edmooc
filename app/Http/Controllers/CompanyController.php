<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;
use App\Course;
use App\User;
use App\Category;
use App\Tutor;

class CompanyController extends Controller
{
    public function getMyCourse()
    {
        $userLogin = Auth::user();
        $categories = Category::all();
        $company = Company::where('user_id', $userLogin->id)->first();
        $tutors = Tutor::where('company_id', $company->id)->get();
        $courses = Course::where('company_id', $company->id)->paginate(5);
        // $courses = Company::all();
        if ($courses->isEmpty()) {
            \Session::flash('course', 'Dont have course to teach');
        } else {
            foreach ($courses as $course) {
                $course = Course::find($course->id);
            }
        }

        if ($tutors->isEmpty()) {
            \Session::flash('tutors', 'Dont have tutor');
        } else {
            foreach ($tutors as $tutor) {
                $tutor = Tutor::find($tutor->id);
            }
        }
        return view(
            'dashboard/company/course', [
                'userLogin' => $userLogin,
                'categories' => $categories,
                'tutors' => $tutors,
                'courses' => $courses
            ]
        );
    }
    
    public function getEditCourseForm($id)
    {
        $userLogin = Auth::user();
        $categories = Category::all();
        $tutors = Tutor::all();
        $course = Course::find($id);
        // dd('hello');
        return view(
            'dashboard/company/course-edit', [
                'userLogin' => $userLogin,
                'categories' => $categories,
                'tutors' => $tutors,
                'course' => $course
            ]
        );
    }
    
    public function createCourse(Request $request)
    {
        $userLogin = Auth::user();
        $company = Company::where('user_id', $userLogin->id)->first();
        // dd($userLogin);
        // dd($company);
        $data = $request->all();
        $startDate = date('Y-m-d', strtotime($data['startDate']));
        $endDate = date('Y-m-d', strtotime($data['endDate']));
        
        // dd($data['tutor']);
        
        if ($data['type'] == 'free') {
            if ($data['category'] == '1') {
                $course = Course::create(
                    [
                    'company_id' => $company->id,
                    'category_id' => $data['category'],
                    'tutor_id' => $data['tutor'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'type' => $data['type'],
                    'start_date' => $startDate,
                    'end_date' => $endDate
                    ]
                );
            } else if ($data['category'] == '2') {
                $course = Course::create(
                    [
                    'company_id' => $company->id,
                    'category_id' => $data['category'],
                    'tutor_id' => $data['tutor'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'type' => $data['type'],
                    'start_date' => $startDate,
                    'end_date' => $endDate
                    ]
                );
            } else {
                $course = Course::create(
                    [
                    'company_id' => $company->id,
                    'category_id' => $data['category'],
                    'tutor_id' => $data['tutor'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'type' => $data['type'],
                    'start_date' => $startDate,
                    'end_date' => $endDate
                    ]
                );
            }
        } else {
            //dd('hello');
            if ($data['category'] == '1') {
                $course = Course::create(
                    [
                    'company_id' => $company->id,
                    'category_id' => $data['category'],
                    'tutor_id' => $data['tutor'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'type' => $data['type'],
                    'price' => $data['price'],
                    'start_date' => $startDate,
                    'end_date' => $endDate
                    ]
                );
            } else if ($data['category'] == '2') {
                $course = Course::create(
                    [
                    'company_id' => $company->id,
                    'category_id' => $data['category'],
                    'tutor_id' => $data['tutor'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'type' => $data['type'],
                    'price' => $data['price'],
                    'start_date' => $startDate,
                    'end_date' => $endDate
                    ]
                );
            } else {
                $course = Course::create(
                    [
                    'company_id' => $company->id,
                    'category_id' => $data['category'],
                    'tutor_id' => $data['tutor'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'type' => $data['type'],
                    'price' => $data['price'],
                    'start_date' => $startDate,
                    'end_date' => $endDate
                    ]
                );
            }
        }
        return back();
    }

    public function updateCourse(Request $request, $id) 
    {
        $course = Course::find($id);
        $data = $request->all();
        $startDate = date('Y-m-d', strtotime($data['startDate']));
        $endDate = date('Y-m-d', strtotime($data['endDate']));
        $course->name = $data['name'];
        $course->description = $data['description'];
        if ($data['type'] == 'paid') {
            $course->type = $data['type'];
            $course->price = $data['price'];
        } else {
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

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('/dashboard/company/course');
    }

    public function changeCourseStatus(Request $request)
    {
        $course = Course::find($request->id);
        $course->status = $request->status;
        $course->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function getRevenue()
    {
        $userLogin = Auth::user();
        return view(
            'dashboard/company/revenue', [
                'userLogin' => $userLogin
            ]
        );
    }

    public function searchCourse(Request $request)
    {   
        $userLogin = Auth::user();
        $categories = Category::all();
        $tutors = Tutor::all();
        $company = Company::where('user_id', $userLogin->id)->first();
        $courses = Course::where('company_id', $company->id)->get();
        $search = $request->search;
        $courses = Course::where('name', 'like', "%" .$search. "%")->paginate(5);
        //dd($courses);
        return view(
            'dashboard/company/course', [
                'userLogin' => $userLogin,
                'categories' => $categories,
                'tutors' => $tutors,
                'courses' => $courses
            ]
        );
    }
}
