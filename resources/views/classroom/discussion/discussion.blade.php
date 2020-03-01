@extends('layouts.template-student')

@section('tab-title')
    <title>Forum Diskusi</title>
@endsection

@section('menu')
    <li><a href="{{ URL('/classroom/1') }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Materi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            {{--@foreach($topics as $topic)
            <li><a href="{{ route('student.topic.index', [$topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach--}}
        </ul>
    </li>

    <li class="active">
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-th"></i> <span>Forum Diskusi</span>
            
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/discussion.css') }}">
    
    <section class="content">

        
        <div class="course-list">
            <div class="top-section gridspan">
                <div class="col-left">
                    <div class="course-title" style="margin-bottom: 20px;">
                        <h2 class="course-name" style="margin-top: 5px; margin-bottom: 5px;"> {{$discussions->title}}</h2>
                        <span>discussion posted by {{$discussions->user_id}}</span> 
                    </div>
                    <div class="course-detail">   
                        <h5 class="course-description">{{$discussions->content}}</h5>
                    </div>
                </div>                      
            </div>
            <hr>
            <div class="bottom-section gridspan">
                <button>Beri Komentar</button>

                {{--<div id="disqus_thread"> </div>
                <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://edmooc.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>--}}
            </div>
            
        </div>
        <div class="course-list">
            <div class="top-section gridspan">
                <div class="col-left">
                    <div class="course-detail">
                        <div class="course-detail">
                            <h5>komentar nanti disini</h5>
                        </div>
                    </div>
                </div>                      
            </div>
            <hr>
            <div class="bottom-section gridspan">
                
                <textarea name="content" class="regular-textarea" placeholder="tanggapan komentar nanti disini"></textarea>
            </div>     
        </div>
        {{--<a>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></a>--}}
    </section>
@endsection