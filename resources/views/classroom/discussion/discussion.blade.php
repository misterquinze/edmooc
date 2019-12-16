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
            <li><a href="{{ URL('classroom/1/topic/1') }}"><i class="fa fa-circle-o"></i> Minggu Ke-1</a></li>
            <li><a href="{{ URL('classroom/1/topic/2') }}"><i class="fa fa-circle-o"></i> Minggu Ke-2</a></li>
            <li><a href="{{ URL('classroom/1/topic/3') }}"><i class="fa fa-circle-o"></i> Minggu Ke-3</a></li>
            <li><a href="{{ URL('classroom/1/topic/4') }}"><i class="fa fa-circle-o"></i> Minggu Ke-4</a></li>
        </ul>
    </li>

    <li class="active">
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-th"></i> <span>Forum Diskusi</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-green">1</small>
            </span>
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/discussion.css') }}">
    
    <section class="content">
        <h5>Fourm Diskusi</h5>
        <hr>
        <div class="course-list">
            <div class="top-section gridspan">
                <div class="col-left">
                    <div class="course-detail">
                        @foreach($discussions as $disc)
                        <h3 class="course-name"> {{$disc->title}}</h3> 
                        <h5 class="course-description">{{$disc->content}}
                        </h5>
                        @endforeach
                    </div>
                </div>                      
            </div>
            <div class="bottom-section gridspan">
                <div id="disqus_thread"> </div>
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
                    </script>
            </div>
            
        </div>
        <a>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></a>
    </section>
@endsection