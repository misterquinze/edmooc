<?php

namespace App\Http\Controllers;

use App\Tutor;
use App\Course;
use App\Ac_course;
use App\Enrollment;
use App\Ac_enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{   
    /**  
     * Get dashboard page.
     *
     * @return mixed
     * 
     * 
    */
    public function getDashboard()
    {
        $userLogin = Auth::user();
        
        if (Auth::check()) {
            $enrollment = Enrollment::where('user_id', '=', Auth::id())->get();
            $ac_enrollment = Ac_enrollment::where('user_id', '=', Auth::id())->get();
            $courses = [];
            $ac_courses = [];
            foreach ($enrollment as $row) {
                $courses[] = $row->course;
            }
            $courses = collect($courses);
            foreach ($ac_enrollment as $row) {
                $ac_courses[] = $row->ac_course;
            }
            $ac_courses = collect($ac_courses);
        } else {
             $courses = Course::all();
             $ac_courses = Ac_course::all();
        }

            
        if ($courses or $ac_courses->isEmpty()) {
             \Session::flash('course', 'Not enrolled to any courses');
        } else {
            foreach ($courses as $course) {
                $course = Course::find($course->id);
            }
            foreach ($ac_courses as $ac_course) {
                $ac_course = Ac_course::find($ac_course->id);
            }
        }
       
        $enrollment = Enrollment::where('user_id', '=', Auth::id())->get();
        $ac_enrollment = Ac_enrollment::where('user_id', '=', Auth::id())->get();
        
        //dd($enrollment);
        return view('dashboard/home', [
            'userLogin'=> $userLogin,
            'courses' => $courses,
            'ac_courses' => $ac_courses,
            //'taccourse' => $taccourse,
            'enrollment'=> $enrollment,
            'ac_enrollment'=> $ac_enrollment
            
        ]);
    }

    /* to get setting page
    */
    public function getSettings() 
    {
        $userLogin = Auth::user();

        return view('dashboard/settings', ['userLogin'=>$userLogin]);
    }

    public function updateProfile(Request $request){
        $userLogin = Auth::user();
        // dd($request->all());
        //dd($request->hasFile('photo'));
        $userLogin->name = $request->name;
        $userLogin->password = bcrypt($request->password);
        
        if($request->hasFile('photo')){
            $path = $request->file('photo')->storeAs("profile-photo", 'photo-'.$userLogin->id.'-'.str_random(10).'.'.$request->phoyo->extension());
            if($userLogin->photo){
                Storage::delete("profile-photo/".basename($userLogin->photo));
            }
            $userLogin->photo = basename($path);
        }

        $userLogin->save();

        return back();
    }

}
