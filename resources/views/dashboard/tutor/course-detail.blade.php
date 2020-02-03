@extends('layouts.template-tutor')

@section('tab-title')
    <title>Overview Class</title>
@endsection

@section('menu')
<li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
<li class="active"><a href="{{ URL('dashboard/tutor/course') }}"><i class="fa fa-book"></i> <span>Kursus</span></a></li>
<li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-th"></i> <span>Forum Diskusi</span></a></li>
<li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Penilaian</span></a></li>
<li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>

@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/tutor/course-detail.css') }}"> 

    <section class="content">
        <div id="course">
            <template>
                <div id="display-container">
                    @foreach ($courses as $course)
                    <div class="gridspan">
                        <h3 class="title">{{$course->name}}</h3>
                        
                    </div>
                    <hr>
                    <div class="course-content">
                       
                        <div class="gridspan">
                            <div class="right-section">
                                <div class="filter-box">
                                    <div class="filter-header">
                                        Tipe Kursus
                                    </div>
                                    <div class="filter-body">
                                        <h5>{{$course->type}}</h5> 
                                    </div>
                                </div>
                                <div class="filter-box">
                                    <div class="filter-header">
                                        Kursus Dimulai
                                    </div>
                                    <div class="filter-body">
                                        <h5>{{$course->start_date}}</h5> 
                                    </div>
                                </div>
                            </div>
                            <div class="left-section">
                                <div class="course-list ">
                                    <div class="top-section gridspan">
                                        
                                        <h2 class="course-title">Welcome to {{$course->name}}</h2>
                                        <h5 class="course-description">{{$course->description}}</h5>
                                        <hr>
                                        <div class="course-detail">
                                        <span class="add-btn" @click.prevent="changeType('create')">Tambah Topik</span>
                                         
                                        </div>
                                    </div>
                                </div>        
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Buat Topik Baru
                    </div>
                        <form action="{{ URL('dashboard/course/list') }}" method="POST">
                            <div class="form-body">
                                {{ csrf_field() }}
    
                                <div class="input-container">
                                    <h4 class="input-title">Judul Topik</h4>
                                    <p class="input-sub-title">Beri nama kursus anda sejelas mungkin</p>
                                    <input type="text" name="name" class="regular-input" required>
                                </div>
        
                                <div class="input-container">
                                    <h4 class="input-title">Deskripsi Topik</h4>
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

    {{-- <div class="register-content">
        <div id="register">
            <template>
                <div class="tab-menu">
                    <ul class="gridspan">
                        <li @click.prevent="changeType('course')" :class="{'is-active': type=='course'}">Kursus</li>
                        <li @click.prevent="changeType('discussion')" :class="{'is-active': type=='discussion'}">Diskusi</li>
                        <li @click.prevent="changeType('grading')" :class="{'is-active': type=='grading'}">Penilaian</li>
                    </ul>
                </div>
                <div v-if="type == 'course'" class="register-box">
                    @foreach ($courses as $course)
                        <h2 class="title">{{$course->name}}</h2>
                        <p class="sub-title">{{$course->description}}</p>
                    @endforeach
                        <span class="add-btn" @click.show="changeType ('create')">Tambah Topik</span>
                        
                </div>
                <div v-if="type == 'discussion'" class="register-box">
                    <h2 class="title">Diskusi</h2>
                        <p class="sub-title">You can make more than one course</p>       
                </div>
                <div v-if="type == 'grading'" class="register-box">
                    <h2 class="title">Penilaian</h2>
                        <p class="sub-title">You can become a teacher in more than one institution</p> 
                </div>
            </template>
        </div>
    </div> --}}
       
    <script src="{{ URL('js/vue.js') }}"></script>

     {{--<script>
        new Vue({
            el: '#register',
            data() {
                return {
                    type: 'course'
                }
            },
            methods: {
                changeType(type){
                    this.type = type
                }
            }
            
    
        }); 
    </script>--}}
        
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
    </script>

@endsection