<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Topic;
use App\Content;
use App\Enrollment;
use App\Favorite;
use App\UserCourse;

class StudentController extends Controller
{
    
    public function getMyCourse()
    {
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

    public function getOverview(Course $courses, $id)
    {
          
        $userLogin = Auth::user();
        $course = Course::where('id', $id)->first();
        $topics = Course::findOrFail($id)->topics()->get();
        $discussions = Course::findOrFail($id)->discussions()->get();

        return view('dashboard/student/overview', [
             'userLogin' => $userLogin, 
             'course' => $course, 
             'topics' => $topics, 
             'discussions' => $discussions
        ]);
    }

   public function getTopic($topicId)
   {
        $userLogin = Auth::user();
        $topic = Topic::findOrFail($topicId);
        $topic = Topic::where('id', $topic->id)->first();
        //$topics = Course::where('')->topics()->get();
        $contents = Content::where('topic_id', $topic->id)->get();

        if ($contents->isEmpty()) {
            \Session::flash('content', 'Dont have content');
        } else {
            foreach ($contents as $content){
                $content = Content::find($content->id);
            }
        }

        return view('dashboard/student/content/list', [
            'userLogin' => $userLogin,
            'topic' => $topic,
            'contents' => $contents
        ]);
    }

    public function getContentDetail($id, $topicId, $contentId)
    {
        $userLogin = Auth::user();
        $course = Course::where('id', $id)->first();
        $topic = Topic::findOrFail($topicId);
        $topic = Topic::where('id', $topic->id)->first();
        $content = Content::findOrFail($contentId);
        $content = Content::where('id', $content->id)->first();
        $contents = Content::where('topic_id', $topic->id)->get();
        //dd($contents);
       
        return view('dashboard/student/content/detail', compact(
            'userLogin',
            'topic', 
            'content', 
            'contents' 
        ));
    }

    public function enroll(Course $course, $id)
    {   
        $course = Course::find($id);

        if (Auth::guest()) {
            return redirect(route('login'));
        }
        else{
            //dd('test');
            if(Auth::user()->role == 'student'){
                $enrollment = Enrollment::create([
                    'user_id' => Auth::id(),
                    'course_id' => $course->id,
                    'status' => 0,
                ]);
                $enrollment->save();
                return redirect('/dashboard');
            } else {
                \Session::flash('course', 'Not enrolled to any courses');
                return redirect('/course')->with('alert', 'sorry, youre not student!');
            }
            
        }
        //add enroll request to admin dashboard
        
        
        return view('dashboard/student/course', [
            'enrollment' => $enrollment,
            'course' => $course
        ]);
    }

    public function unenroll(Course $course, $id)
    {   
        $course = Course::find($id);

        $enrollment = Enrollment::where([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'status' => 0,
        ]);
        $enrollment->delete();
        
        \Session::flash('flash_message', 'You have been unenrolled from the course!');
        return redirect('/dashboard/course/me');
    }

    public function getFavorite(){
        $userLogin = Auth::user();
        $favorite = Auth::user()->favorites;
        $favorite = Favorite::all();
        $course = Course::all();

        if ($favorite->isEmpty()) {
            \Session::flash('course', 'No favorite course');
        } else {
            foreach ($courses as $course) {
                $course = Course::find($course->id);
            }
        }

        return view('dashboard/student/favorite',[
            'userLogin' => $userLogin,
            'course' => $course,
            'favorite' => $favorite
        ]);
    }

    public function getTransaction(){
        $userLogin = Auth::user();
        
        return view('dashboard/student/transaction',[
            'userLogin' => $userLogin
        ]);
    }
    public function favoriteCourse(Course $course)
    {
        Auth::user()->favorites()->attach($course->id);

        return back();
    }

    /**
     * Unfavorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function unFavoriteCourse(Course $course)
    {
        Auth::user()->favorites()->detach($course->id);

        return back();
    }

}
