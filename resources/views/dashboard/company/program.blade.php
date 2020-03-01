@extends('layouts.template-tutor')

@section('tab-title')
    <title>Program - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Professional</span></a></li>
    <li class="active"><a href="{{ URL('dashboard/company/program') }}"><i class="fa fa-book"></i> <span>Akademik</span></a></li>
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
                        <h3 class="title">Program</h3>
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
                                        <input type="text" name="search" class="input" placeholder="Search course name">
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
                                    @foreach ($program as $p)    
                                        <div class="course-list ">
                                            <div class="top-section gridspan">
                                                    
                                                <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                                                <div class="course-detail">
                                                    <h3 class="course-name">{{ $p->name }}</h3> 
                                                    <h5 class="course-description">{{$p->description}}
                                                    </h5> 
                                                </div>
                                            </div>
                                            <div class="bottom-section gridspan">
                                                <div class="col-left">
                                                    tes
                                                </div>
                                                <div class="col-right">
                                                    <span class="delete-btn" onclick="deleteProgram({{ $p->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <a href="{{ URL('dashboard/program/'.$p->id.'/edit') }}" class="edit-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                        
                                            </div>
                                        </div>
                                    <form class="form-delete" id="delete-{{ $p->id }}" action="{{ URL('dashboard/program/'.$p->id.'/delete') }}"  method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Buat Program Baru
                    </div>

                    <form action="{{ URL('dashboard/company/program') }}" method="POST">
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="input-container">
                                <h4 class="input-title">Nama Program</h4>
                                <p class="input-sub-title">Beri nama kursus anda sejelas mungkin</p>
                                <input type="text" name="name" class="regular-input" required>
                            </div>
    
                            <div class="input-container">
                                <h4 class="input-title">Gelar Program</h4>
                                <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                <input type="text" name="degree" class="regular-input" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Persyaratan Program</h4>
                                <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                <input type="text" name="requirement" class="regular-input" required>
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
      

    </script>
    <script>
        $("#filterDate").daterangepicker()
        $("#startDate").datepicker()
        $("#endDate").datepicker()

        function deleteProgram(id) {
            swal({   
                title: "Apakah anda yakin?",
                text: "Data program yang dihapus tidak dapat dikembalikan",
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