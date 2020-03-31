@extends('layouts.template-tutor')

@section('tab-title')
    <title>My Course - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li class="active"><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Professional</span></a></li>
    <li><a href="{{ URL('dashboard/company/program') }}"><i class="fa fa-graduation-cap"></i> <span>Akademik</span></a></li>
    <li><a href="{{ URL('dashboard/revenue') }}"><i class="fa fa-list"></i> <span>Pendapatan</span></a></li>
    {{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li> --}}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/company/course.css') }}">

    <section class="content">
        <div id="course">
            <template>
                <div id="display-container">
                    <div class="gridspan">
                        <h3 class="title">Kursus Professional</h3>
                        <span class="add-btn" @click.prevent="changeType('create')">Buat Baru</span>
                    </div>
                    <hr>
                    <div class="course-content">
                        <div class="gridspan">
                            <div class="left-section">
                                <div class="filter-box">
                                    <div class="filter-header">
                                        Search
                                    </div>
                                    <div class="filter-body">
                                        <form class="search-group" action="/dashboard/course/search" method="GET">
                                            <span>
                                                <input type="text" name="search" class="search-input" placeholder="Search course name">
                                                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                
                                <div class="filter-box">
                                    <div class="filter-header">
                                        Type
                                    </div>
                                    <div class="filter-body">
                                        <form action="{{ URL('') }}" method="post">
                                            {{ csrf_field() }}
                                            
                                            <label class="filter-container">
                                                Free Courses
                                                <input type="checkbox" name="free">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="filter-container">
                                                Paid Courses
                                                <input type="checkbox" name="paid">
                                                <span class="checkmark"></span>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="filter-box">
                                    <div class="filter-header">
                                        Category
                                    </div>
                                    <div class="filter-body">
                                        <form action="{{ URL('') }}" method="post">
                                            {{ csrf_field() }}
                                            
                                            <label class="filter-container">
                                                Business
                                                <input type="checkbox" name="free">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="filter-container">
                                                Education
                                                <input type="checkbox" name="paid">
                                                <span class="checkmark"></span>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="filter-box">
                                    <div class="filter-header">
                                        Date
                                    </div>
                                    <div class="filter-body">
                                        <input type="text" name="date" id="filterDate" class="input" placeholder="Choose Date">
                                    </div>
                                </div>
                            </div>
                            <div class="right-section">
                                    @foreach ($courses as $course)    
                                        <div class="course-list ">
                                            <div class="top-section gridspan">
                                                    
                                                <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                                                <div class="course-detail">
                                                    <h3 class="course-name">{{ $course->name }}</h3> 
                                                    <h5 class="course-description">{{$course->description}}
                                                    </h5> 
                                                </div>
                                            </div>
                                            <div class="bottom-section gridspan">
                                                <div class="col-left">
                                                    @if ($course->type == 'paid')
                                                        <span class="price">Rp {{ number_format($course->price) }}</span>
                                                    @else
                                                        <span class="price">Gratis</span>
                                                    @endif
                                                </div>
                                                <div class="col-right">
                                                    <span class="delete-btn" onclick="deleteCourse({{ $course->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <a href="{{ URL('dashboard/course/'.$course->id.'/edit') }}" class="edit-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                        
                                            </div>
                                        </div>
                                    <form class="form-delete" id="delete-{{ $course->id }}" action="{{ URL('dashboard/course/'.$course->id.'/delete') }}"  method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                @endforeach
                                {{$courses->links()}}
                            </div>
                        </div>
                    </div>
                </div>

                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Buat Kursus Baru
                    </div>

                    <form action="{{ URL('dashboard/course/list') }}" method="POST">
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="input-container">
                                <h4 class="input-title">Nama Kursus</h4>
                                <p class="input-sub-title">Beri nama kursus anda sejelas mungkin</p>
                                <input type="text" name="name" class="regular-input" required>
                            </div>
    
                            <div class="input-container">
                                <h4 class="input-title">Deskripsi Kursus</h4>
                                <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                <textarea name="description" class="regular-textarea" required></textarea>
                            </div>

                            <div class="input-container">
                                <h4 class="input-title">Tipe Kursus</h4>
                                <p class="input-sub-title">Tentukan tipe kursus</p>
                                <label class="radio-container">
                                    Gratis
                                    <input type="radio" name="type" value="free" v-model="courseType">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">
                                    Berbayar
                                    <input type="radio" name="type" value="paid" v-model="courseType">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div v-if="courseType == 'paid'" class="input-container">
                                <h4 class="input-title">Biaya Kursus</h4>
                                <p class="input-sub-title">Tentukan biaya kursus</p>
                                <input type="number" name="price" class="regular-input" required>
                            </div>
                            
                            <div id="category" class="input-container">
                                <h4 class="input-title">Kategori Kursus</h4>
                                <p class="input-sub-title">Tentukan kategori kursus</p>
                                {{--<select name="category" class="regular-select">
                                    <option>Pilih kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach 
                                </select>--}}
                                @foreach ($categories as $category)
                                    <label class="radio-container">
                                        {{$category->name}}
                                        <input type="radio" name="category" value="{{$category->id}}" >
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>

                            <div class="input-container">
                                <h4 class="input-title">Tutor Kursus</h4>
                                <p class="input-sub-title">Tentukan Tutor kursus</p>
                                {{--<select name="tutor" class="regular-select">
                                    <option>Pilih Tutor</option>
                                        @foreach ($tutors as $tutor)
                                            <option value="{{ $tutor->id }}">{{ $tutor->name }}</option>
                                        @endforeach   
                                </select>--}}
                                @foreach ($tutors as $tutor)
                                    <label class="radio-container">
                                        {{$tutor->user->name}}
                                        <input type="radio" name="tutor" value="{{$tutor->id}}" >
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>

                            <div class="input-container">
                                <h4 class="input-title">Tanggal Mulai</h4>
                                <p class="input-sub-title">Tentukan tanggal mulai kursus</p>
                                <input type="text" name="startDate" class="regular-input" id="startDate" placeholder="Choose Date" required>
                            </div>
    
                            <div class="input-container">
                                <h4 class="input-title">Tanggal Selesai</h4>
                                <p class="input-sub-title">Tentukan tanggal selesai kursus</p>
                                <input type="text" name="endDate" class="regular-input" id="endDate" placeholder="Choose Date" required>
                            </div>
    
                        </div>
                        <div class="form-footer gridspan">
                            <span class="cancel-btn" @click.prevent="changeType('display')">Batal</span>
                            <button type="submit" class="submit-btn">Kirim</button>
                        </div>
                    </form>
                </div>

            </template>
        </div>

    </section>

    <script src="{{ URL('js/vue.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    {{-- <script src="{{ URL('js/sweetalert.min.js') }}"></script> --}}

    <script>
        new Vue({
            el: '#course',
            data() {
                return {
                    courseType: 'free',
                }
            },
            methods: {
                changeType(type){
                    if(type == 'display'){
                        $("#display-container").show()
                        $("#form-container").hide()
                    }else{
                        $("#display-container").hide()
                        $("#form-container").show()
                    }
                }
            }

        });
        CKEDITOR.replace( 'description' );

    </script>
    <script>
        $("#filterDate").daterangepicker()
        $("#startDate").datepicker()
        $("#endDate").datepicker()

        function deleteCourse(id) {
            swal({   
                title: "Apakah anda yakin?",
                text: "Data kursus yang dihapus tidak dapat dikembalikan",
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

    
@endsection