<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Ac_course;
use App\User;
use App\Category;
use App\Tutor;
use App\ac_topic;
use App\Discussion;
use App\Program;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

        $accourse = Ac_course::create([
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
            
        ]);
        //dd($accourse);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAcCourse(Request $request, $id)
    {
        $accourse = Ac_course::find($id);
        $data = $request->all();

        $startDate = date('Y-m-d',strtotime($data['startDate']));
        $endDate = date('Y-m-d',strtotime($data['endDate']));

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

    // course overview
    public function getAcTopicList($id){
        $userLogin = Auth::user();
        $accourse = Ac_course::where('id', $id)->first();
        $ac_topics = Ac_course::findOrFail($id)->ac_topics()->get();
        //$discussions = Ac_course::findOrFail($id)->discussions()->get();

        return view('dashboard/tutor/ac-topic/ac-list', [
             'userLogin' => $userLogin, 
             'accourse' => $accourse, 
             'ac_topics' => $ac_topics 
             //'discussions' => $discussions
        ]);
    }

    // Topik
    public function createAcTopic(Request $request, Ac_course $accourses, $id){
        $accourses =  Ac_course::where('id', $accourses->id)->get();
        $accourses =  Ac_course::findOrFail($id);
        $userLogin = Auth::user();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();

        $data = $request->all();

        $ac_topics = Ac_topic::create([        
            'ac_course_id' => $accourses->id,
            'tutor_id' => $tutor->id,
            'name' => $data['name'],
            'description' => $data['description'],    
        ]);
        $ac_topics->save();

        return back();
    }

    public function updateAcTopic(Request $request, $topicId){
        $topics = Topic::findOrFail($topicId);
        $data = $request->all();

        $topics->name = $data['name'];
        $topics->description = $data['description'];
        $topics->save();

        return back();
    }

    public function deleteAcTopic($id){
        $topics = Topic::findOrFail($id);
        $topics->delete();

        return back();
    }

    //content
    public function getAcContentList($topicId){
        $userLogin = Auth::user();
        $ac_topic = Ac_topic::findOrFail($topicId);
        $ac_topic = Ac_topic::where('id', $ac_topic->id)->first();
        //$topics = Course::findOrFail($id)->topics()->get();
        $contents = Ac_content::where('topic_id', $ac_topic->id)->get();

        if ($contents->isEmpty()) {
            \Session::flash('content', 'Dont have content');
        }else {
            foreach($contents as $content){
                $content = Content::find($content->id);
            }
        }

        return view('dashboard/tutor/content/list', [
            'userLogin' => $userLogin,
            'ac_topic' => $ac_topic,
            
            'contents' => $contents
        ]);
    }

    public function getAcContentDetail($AccontentId)
    {
        $userLogin = Auth::user();
       
        $Accontents = Content::findOrFail($AccontentId);
        $Accontents = Content::where('id', $Accontents->id)->get();
        //$topics = Course::findOrFail($topicId)->topics()->get();
        
        //dd($contents);
        return view('dashboard/tutor/content/detail', compact('userLogin', 'contents'));
    }

    public function createAcContentForm($ActopicId){   
        $userLogin = Auth::user();
        $topics = Topic::where('id', $ActopicId)->get();
        return view('dashboard/tutor/content/form-create', compact('userLogin', 'topics'));
    }

    public function storeAcContent(Request $request, $ActopicId){   
        $topics = Topic::where('id', $ActopicId)->get();
        $topics = Topic::findOrFail($ActopicId);
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
        if($data['type'] == 'video'){
            
            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' => 'storage/' .$newName
                
            ]);
        }elseif($data['type'] == 'slide'){
            
            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' =>'storage/' .$newName
                
            ]);
        }else{

            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
           
            ]);
        }
        
        $contents->save();
        $topics = Topic::where('id', $topicId)->first();
        $contentsData = Content::where('topic_id', $topics->id)->get();

        if ($contentsData->isEmpty()) {
            \Session::flash('content', 'Dont have content');
        }else {
            foreach($contentsData as $content){
                $content = Content::find($content->id);
            }
        }

        $contents = Content::where('topic_id', $topics->id)->get();
        
        return redirect()->route('tutor.content.index', [$topics->id]);
    }





}
