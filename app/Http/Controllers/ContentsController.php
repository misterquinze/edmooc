<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Tutor;
use App\Content;
use App\Topic;
use App\Course;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($contentId)
    {
        $userLogin = Auth::user();
       
        $contents = Content::findOrFail($contentId);
        $contents = Content::where('id', $contents->id)->get();
        //$topics = Course::findOrFail($topicId)->topics()->get();
        return view('classroom/topic/content/index', compact('userLogin', 'contents'));
    }

    public function create($topicId)
    {   
        // dd($topicId);
        $userLogin = Auth::user();
       
        $topics = Topic::where('id', $topicId)->get();
        
        return view('classroom/topic/content/create', compact('userLogin', 'topics'));
    }

    public function store(Request $request, Topic $topics, $topicId)
    {   
        $topics = Topic::where('id', $topicId)->get();
        $topics = Topic::findOrFail($topicId);
        $userLogin = Auth::user();
        $tutor = Tutor::where('user_id', $userLogin->id)->first();
        
        $data = $request->all();
        //dd($data);

        if($data['type'] == 'video'){
            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' => $data['source']
                
            ]);
        }elseif($data['type'] == 'artikel'){
            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' => $data['source']
                
            ]);
        }else{
            $contents = Content::create([
                'tutor_id' => $tutor->id,
                'topic_id' => $topics->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'source' => $data['source']
                
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

        return view('classroom/topic/topic', [
            'userLogin' => $userLogin,
            'topics' => $topics,
            'contents' => $contentsData
        ]);
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $contents = Content::findOrFail($contentId);
        $data = $request->all();

        $contents->title = $data['title'];
        $contents->description = $data['title'];
        if($data['type'] == 'video'){
            $contents->type = $data['type'];
            $contents->source = $data['source'];
        }elseif($data['type'] == 'artikel'){
            $contents->type = $data['type'];
            $contents->source = $data['source'];
        }else{
            $contents->type = $data['type'];
            $contents->source = $data['source'];
        }
        $contents->tutor_id = $data['tutor'];
        $contents->topic_id = $data['topic'];
        $contents->save();

        return redirect ('clasroom/topic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($contentId)
    {
        $contents = Content::findOrFail($contentId);$contents->delete();

        return redirect('classroom/topic');
    }
}
