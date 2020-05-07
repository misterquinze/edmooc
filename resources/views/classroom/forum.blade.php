@extends('layouts.template-student')

@section('tab-title')
    <title>Forum Diskusi</title>
@endsection

@section('menu')
    @if(auth()->user()->role == 'tutor')
        <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('classroom/'.$courses->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Topik</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">        
                @foreach($topics as $topic)
                    <li><a href="{{ route('tutor.topic.index', [$topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="active"><a href="{{ URL('classroom/'.$courses->id.'/forum') }}"><i class="fa fa-comment"></i> <span>Forum Diskusi</span></a></li>
    @else
        <li><a href="{{  route('student.overview', [$courses->id]) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
        <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Topik</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            @foreach($topics as $topic)
            <li><a href="{{ route('student.topic.index',  [ $topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
        </ul>
        </li>
        <li class="active">
            <a href="{{ URL('classroom/'.$courses->id.'/forum') }}">
            <i class="fa fa-comment"></i> <span>Forum Diskusi</span>
                {{-- <span class="pull-right-container">
                    <small class="label pull-right bg-green">1</small>
                </span> --}}
            </a>
        </li>
        <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
    @endif
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/forum.css') }}">
    
    <section class="content">
        <div id="forum">
            <template>
                <div id="display-container">
                    <div class="gridspan">
                        <h3 class="title">Forum Diskusi </h3>
                            {{-- 
                            <a href="{{route('discussion.create', [$courses->id])}}">
                                <span class="add-btn">Buat Diskusi</span>
                            </a>
                        <button type="button" class="add-btn" id="add-item" data-item-id="1">Buat Diskusi</button>--}}
                    </div>
                    <hr>
                    <div class="course-content">
                        <div class="gridspan">
                            <div class="right-section">
                               
                                <div class="filter-box">
                                    <div class="filter-header">
                                        Deskripsi
                                    </div>
                                    <div class="filter-body">
                                        <p>
                                        Selamat datang di forum diskusi kursus! silahkan bertanya, berdiskusi dan berdebat materi kursus.
                                        </p>
                                    </div>
                                </div>
                                <div class="filter-box">
                                    <div class="filter-header">
                                        Tutor Kursus
                                    </div>
                                    <div class="filter-body">
                                        {{$courses->tutor->name}}
                                    </div>
                                </div>
                                
                               
                            </div>
                            <div class="left-section">
                                <div class="disc-header gridspan">
                                    
                                    <div class="head">
                                        <form class="search-group" action="{{ route('search.discussion',  [ $courses->id]) }}" method="GET">
                                            <span>
                                                <input type="text" name="search" class="search-input" placeholder="Search discussion">
                                                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </form> 
                                    </div>
                                    <div class="head"><button type="button" class="add" id="add-item" data-item-id="1">Buat Diskusi</button>
                                    </div>
                                </div>
                                <div class="disc-list">
                                @if ($discussions->isEmpty())
                                    <div class="course-list">
                                        <div class="top-section gridspan">
                                            <div class="col-left">
                                                <div class="course-detail">
                                                    @if (session('discussion'))
                                                        <div class="card-body">
                                                            <h2 class="alert alert-info">
                                                                {{ session('discussion') }}
                                                            </h2>
                                                        </div>
                                                    
                                                </div>     
                                            </div>
                                        </div>                      
                                    </div>
                                @endif
                                @else
                                    @foreach($discussions as $disc)
                                    
                                        <div class="course-list">
                                            <div class="top-section gridspan">
                                                <a id="disc" href="{{route('discussion.index', [$disc->id])}}">
                                                <div class="col-left">
                                                    <div class="course-title" style="margin-bottom: 20px;">
                                                        <h3 class="course-name" style="margin-top: 5px; margin-bottom: 5px;"> {{$disc->title}}</h3>
                                                        <span>posted {{$disc->created_at->diffForHumans()}} </span> 
                                                    </div>
                                                    <div class="course-detail">
                                                        <div class="course-detail">
                                                            <span>{{str_limit($disc->content, 70) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                                <div class="col-right">
                                                @if(auth()->user()->role == 'tutor')
                                                
                                                <span style="padding-left: 10px" class="delete-btn" onclick="deleteDiscussion({{$disc->id}} )">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                <form class="form-delete" id="delete-{{ $disc->id }}" action="{{ route('discussion.delete', [$disc->id]) }} "  method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                                @else
                                                <span style="margin-right: 5px;">{{$disc->comments->count()}}</span>
                                                    <i class="fa fa-comment"></i>
                                                @endif
                                                </div>                      
                                            </div>
                                   
                                        </div>
                                    
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Edit Diskusi -->
                @foreach($discussions as $disc)
                    <div id="form-edit-{{ $disc->id }}" class="form-create form-edit">
                        <div class="form-header">Edit Diskusi</div>
                        <form action="{{ route('discussion.update', [$disc->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">

                            <div class="form-body">
                                <div class="input-container">
                                    <h4 class="input-title">Judul Materi</h4>
                                    <p class="input-sub-title">Beri Judul Materi</p>
                                    <input type="text" name="title" class="regular-input" value="{{ $disc->title }}" required>
                                </div>
                                <div class="input-container">
                                    <h4 class="input-title">Deskripsi Topik</h4>
                                    <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                    <textarea name="content" class="regular-textarea" required>{{ $disc->content}}</textarea>
                                </div>
                            </div>
                            <div class="form-footer gridspan">
                                <span class="cancel-btn" @click.prevent="changeType('display')">Batal</span>
                                <button type="submit" class="submit-btn">Kirim</button>
                            </div>
                        </form>
                    </div>
                @endforeach
                <!-- modal Tambah Diskusi -->
                <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="modal-header">
                            <h5 class="modal-title" id="edit-modal-label">Buat Diskusi</h5>
                        
                            </div>
                            <div class="modal-body" id="attachment-body-content">
                                <form id="form-container" class="form-horizontal" method="POST" action="{{route('discussion.store', [$courses->id])}}">
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                    <!-- name -->
                                        <div class="input-container">
                                            <h4 class="input-title">Judul Diskusi</h4>
                                            <p class="input-sub-title">Beri Judul Diskusi</p>
                                            
                                            <input type="text" name="title" class="regular-input" id="modal-input-title" required autofocus>
                                        </div>
                                    
                                    <!-- description -->
                                        <div class="input-container">
                                            <h4 class="input-title">Isi Diskusi</h4>
                                            <p class="input-sub-title">tuliskan isi diskusi sejelas mungkin</p>
                                           
                                            <textarea name="content" class="regular-textarea" id="modal-input-content"required></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer gridspan">
                                        <button type="submit" class="submit-btn" >Kirim</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div id="form-container" class="form-create">
                    <div class="form-header">Buat Diskusi</div>
                    
                    <form action="{{action('DiscussionController@store', ['discId' => $discussions->id])}}" method="POST">
                    
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="input-container">
                                <h4 class="input-title">Judul Disukusi</h4>
                                <p class="input-sub-title">Beri judul diskusi anda sejelas mungkin</p>
                                <input type="text" name="title" class="regular-input" required>
                            </div>
    
                            <div class="input-container">
                                <h4 class="input-title">Isi Diskusi</h4>
                                <p class="input-sub-title">Jelaskan diskusi yang ingin anda bahas sejelas mungkin</p>
                                <textarea name="content" class="regular-textarea" required></textarea>
                            </div>


                        </div>
                        <div class="form-footer gridspan">
                            <span class="cancel-btn" @click.prevent="changeType('display')">Batal</span>
                            <button type="submit" class="submit-btn">Kirim</button>
                        </div>
                    </form>
                </div> --}}
            </template>

        </div>
    
    </section>
    <script src="{{ URL('js/vue.js') }}"></script>
    {{-- <script src="{{ URL('js/sweetalert.min.js') }}"></script> --}}

    <script>
        new Vue({
            el: '#forum',
            data() {
                return {
                    courseType: 'free',
                }
            },
            methods: {
                changeType(type,id){
                    if(type == 'display'){
                        $("#display-container").show()
                        $("#form-container").hide()
                        $(".form-edit").hide()
                    }else if(type == 'create'){
                        $("#display-container").hide()
                        $("#form-container").show()
                        $(".form-edit").hide()
                    }else{
                        $("#display-container").hide()
                        $("#form-container").hide()
                        $("#form-edit-"+id).show()
                    }
                }
            }

        });
    </script>
    <script>
       function deleteDiscussion(id) {
            swal({   
                title: "Apakah anda yakin?",
                text: "Data topik yang dihapus tidak dapat dikembalikan",
                icon: "warning",
                closeOnClickOutside: true,
                buttons: ["Batal","Hapus"],
            })
            .then((willDelete) => {
                if(willDelete){
                    $('.form-delete#delete-'+id).submit();
                }
            });
        } 
    </script>
    <script>
        $(document).ready(function() 
    {
        /**
        * for showing add item popup
        */
        $(document).on('click', "#add-item", function() {
            $(this).addClass('add-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
            'backdrop': 'static'
            };
            $('#add-modal').modal(options)
        })
       
        // on modal show
            //add topik
        $('#add-modal').on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");
            // get the data
            
            var title = row.children(".title").text();
            var content = row.children(".content").text();
            // fill the data in the input fields
           
            $("#modal-input-title").val(title);
            $("#modal-input-content").val(content);

        })
       
        // on modal hide
        $('#add-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        })

        
    })
    </script>

@endsection