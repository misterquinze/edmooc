<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Ac_course;
use App\User;
use App\Category;
use App\Tutor;
use App\Ac_topic;
use App\Ac_content;
use App\Discussion;
use App\Program;
use Illuminate\Support\Facades\Storage;

class AcademicController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createAcCourse(Request $request, Program $program, $id)
    {
        $userLogin = Auth::user();
        $company = Company::where('user_id', $userLogin->id)->first();
        $program = Program::where('id', $program->id)->get();
        $program = Program::findOrFail($id);
        $data = $request->all();
        $startDate = date('Y-m-d', strtotime($data['startDate']));
        $endDate = date('Y-m-d', strtotime($data['endDate']));
        $accourse = Ac_course::create(
            [
            'company_id' => $company->id,
            'category_id' => $data['category'],
            'program_id' => $program->id,
            'tutor_id' => $data['tutor'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'passing_grade' => $data['passing_grade'],
            'start_date' => $startDate,
            'end_date' => $endDate
            ]
        );
        //dd($accourse);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateAcCourse(Request $request, $id)
    {
        $accourse = Ac_course::find($id);
        $data = $request->all();
        $startDate = date('Y-m-d', strtotime($data['startDate']));
        $endDate = date('Y-m-d', strtotime($data['endDate']));
        $accourse->name = $data['name'];
        $accourse->description = $data['description'];
        $accourse->price = $data['price'];
        $accourse->category_id = $data['category'];
        $accourse->tutor_id = $data['tutor'];
        $accourse->start_date = $startDate;
        $accourse->end_date = $endDate;
        $accourse->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAcCourse($id)
    {
        $accourse = Ac_course::find($id);
        $accourse->delete();
        return back();
    }

    public function changeAcCourseStatus(Request $request)
    {
        $accourse = Ac_course::find($request->id);
        $accourse->status = $request->status;
        $accourse->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    
    // public function searchAcCourse(Request $request, $id)
    // {   
    //     $userLogin = Auth::user();
    //     $categories = Category::all();
    //     $tutors = Tutor::all();
    //     $program = Program::where('id', $id)->first();
    //     $accourse = Ac_course::where('program_id', $program->id)->get();
    //     $search = $request->search;
        
        
    //     $accourse = Ac_course::where('name', 'like', "%" .$search. "%")->paginate(5);
       
    //     //dd($courses);
    //     return view ('dashboard/company/course', [
    //         'userLogin' => $userLogin,
    //         'categories' => $categories,
    //         'tutors' => $tutors,
    //         'accourse' => $accourse,
    //     ]);
    // }
    
    
    // course overview
    public function getAcTopicList($id)
    {
        $userLogin = Auth::user();
        $accourse = Ac_course::where('id', $id)->first();
        $ac_topics = Ac_course::findOrFail($id)->ac_topic()->get();
        //$discussions = Ac_course::findOrFail($id)->discussions()->get();

        return view(
            'dashboard/tutor/ac-topic/ac-list', [
                'userLogin' => $userLogin, 
                'accourse' => $accourse, 
                'ac_topics' => $ac_topics 
                //'discussions' => $discussions
            ]
        );
    }

    // Topik
    public function createAcTopic(Request $request, Ac_course $accourses, $id)
    {
        $accourses =  Ac_course::where('id', $accourses->id)->get();
        $accourses =  Ac_course::findOrFail($id);
        $userLogin = Auth::user();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();
        $data = $request->all();
        $ac_topics = Ac_topic::create(
            [        
            'ac_course_id' => $accourses->id,
            'tutor_id' => $tutor->id,
            'name' => $data['name'],
            'description' => $data['description'],    
            ]
        );
        $ac_topics->save();
        return back();
    }

    public function updateAcTopic(Request $request, $topicId)
    {
        $ac_topics = Ac_topic::findOrFail($topicId);
        $data = $request->all();
        $ac_topics->name = $data['name'];
        $ac_topics->description = $data['description'];
        $ac_topics->save();
        return back();
    }

    public function deleteAcTopic($id)
    {
        $ac_topics = Ac_topic::findOrFail($id);
        $ac_topics->delete();

        return back();
    }

    //content
    public function getAcContentList($id, $topicId)
    {
        $userLogin = Auth::user();
        $accourse = Ac_course::where('id', $id)->first();
        $ac_topics = Ac_course::findOrFail($id)->ac_topic()->get();
        $ac_topic = Ac_topic::findOrFail($topicId);
        $ac_topic = Ac_topic::where('id', $ac_topic->id)->first();
        //$topics = Course::findOrFail($id)->topics()->get();
        $ac_contents = Ac_content::where('ac_topic_id', $ac_topic->id)->get();

        if ($ac_contents->isEmpty()) {
            \Session::flash('content', 'Dont have content');
        }else {
            foreach($ac_contents as $content){
                $content = Ac_content::find($content->id);
            }
        }

        return view('dashboard/tutor/ac-content/ac-list', [
            'userLogin' => $userLogin,
            'accourse' => $accourse,
            'ac_topics' => $ac_topics,
            'ac_topic' => $ac_topic,
            'ac_contents' => $ac_contents
        ]);
    }

    public function getAcContentDetail($id, $topicId, $AccontentId)
    {
        $userLogin = Auth::user();
        $accourse = Ac_course::where('id', $id)->first();
        
        $ac_topic = Ac_topic::findOrFail($topicId);
        $ac_topic = Ac_topic::where('id', $ac_topic->id)->first();
        $ac_content = Ac_content::findOrFail($AccontentId);
        $ac_content = Ac_content::where('id', $ac_content->id)->first();
        $ac_contents = Ac_content::where('ac_topic_id', $ac_topic->id)->get();
        //$topics = Course::findOrFail($topicId)->topics()->get();
        
        //dd($contents);
        return view('dashboard/tutor/ac-content/ac-detail', compact(
            'userLogin', 
            'ac_topic', 
            'ac_content', 
            'ac_contents'
        ));
    }

    public function createAcContentForm($id, $ActopicId)
    {   
        $userLogin = Auth::user();
        $accourse = Ac_course::where('id', $id)->first();
        $ac_topics = Ac_topic::where('id', $ActopicId)->get();
        return view('dashboard/tutor/ac-content/ac-create', compact(
            'userLogin',
            'accourse', 
            'ac_topics'
        ));
    }
    
    public function storeAcContent(Request $request, $ActopicId)
    {   
        $ac_topics = Ac_topic::where('id', $ActopicId)->get();
        $ac_topics = Ac_topic::findOrFail($ActopicId);
        $userLogin = Auth::user();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();
        
        $data = $request->all();
        $file = $request->file('source');
        $fileName = time();
        $ext = $request->file('source')->getClientOriginalExtension();
        $newName = $fileName . '.' .$ext;
        //$path = $request->file('source')->storeAs('source', $fileName.".".$ext);
        
        Storage::putFileAs('public', $request->file('source'), $newName);
        
        //dd($data);
        if ($data['type'] == 'video') {
            
            $ac_contents = Ac_content::create([
                'tutor_id' => $tutor->id,
                'ac_topic_id' => $ac_topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' => 'storage/' .$newName
                
            ]);
        } elseif ($data['type'] == 'slide') {
            
            $ac_contents = Ac_content::create([
                'tutor_id' => $tutor->id,
                'ac_topic_id' => $ac_topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' =>'storage/' .$newName
                
            ]);
        } else {

            $ac_contents = Ac_content::create([
                'tutor_id' => $tutor->id,
                'ac_topic_id' => $ac_topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' =>'storage/' .$newName
           
            ]);
        }
        
        $ac_contents->save();
        $ac_topics = Ac_topic::where('id', $ActopicId)->first();
        $contentsData = Ac_content::where('ac_topic_id', $ac_topics->id)->get();

        if ($contentsData->isEmpty()) {
            \Session::flash('content', 'Dont have content');
        } else {
            foreach ($contentsData as $content){
                $content = Ac_content::find($content->id);
            }
        }

        $ac_contents = Ac_content::where('ac_topic_id', $ac_topics->id)->get();
        
        return redirect()->route('tutor.accontent.index', [$ac_topics->id]);
    }

    public function deleteContent($id)
    {
        $ac_contents = Ac_content::findOrFail($id);
        $ac_contents->delete();

        return back();
    }
    
    // Kuis
    public function getQuizDetail($ActopicId)
    {
        $userLogin = Auth::user();
        $ac_topic = Ac_topic::findOrFail($ActopicId);
        $ac_topic = Ac_topic::where('id', $ac_topic->id)->first();
        
        return view('dashboard/tutor/quiz/detail', [
            'userLogin' => $userLogin,
            'ac_topic' => $ac_topic
        ]);
    }

    public function getQuizForm($ActopicId)
    {
        $userLogin = Auth::user();
        $ac_topic = Ac_topic::find($ActopicId);

        $ac_topics = Ac_topic::where('course_id', $ac_topic->course->id)->get();
        

        return view('dashboard/tutor/quiz/form-create',[
            'userLogin' => $userLogin,
            'ac_topics' => $ac_topics,
            'ac_topic' => $ac_topic,
        ]);
    }

}
