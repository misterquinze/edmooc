@extends('layouts.template-tutor')

@section('tab-title')
    <title>Edit Topik</title>
@endsection

@section('menu')

    {{--<li class="active"><a href="{{ URL('classroom/'.$course->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>--}}
      
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Materi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            
        @foreach($topics as $topic)
            <li><a href="{{ URL('classroom/'.$topic->id.'/topic') }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            
            {{--<li><a href="{{ URL('classroom/'.$course->topics->id.'/topic') }}"><i class="fa fa-circle-o"></i> Minggu Ke-2</a></li>
            <li><a href="{{ URL('classroom/'.$course->topics->id.'/topic') }}"><i class="fa fa-circle-o"></i> Minggu Ke-3</a></li>
            <li><a href="{{ URL('classroom/'.$course->topics->id.'/topic') }}"><i class="fa fa-circle-o"></i> Minggu Ke-4</a></li>--}}
        @endforeach
        </ul>
    </li>

    <li>
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-th"></i> <span>Forum Diskusi</span>
            {{-- <span class="pull-right-container">
                <small class="label pull-right bg-green">1</small>
            </span> --}}
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/company/course-edit.css') }}">
@foreach($topics as $topic)
    <section class="content">
        <div id="topic">
            <template>
                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Edit Topik
                    </div>

                    <form action="{{ URL('classroom/'.$topic->id.'/edit') }}" method="POST">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">

                            <div class="input-container">
                                <h4 class="input-title">Nama Kursus</h4>
                                <p class="input-sub-title">Beri nama kursus anda sejelas mungkin</p>
                                <input type="text" name="name" class="regular-input" value="{{ $topic->name }}" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Waktu </h4>
                                <p class="input-sub-title">Tentukan tipe kursus</p>
                                <label class="radio-container">
                                                Week 1
                                    <input type="radio" name="week" value="1" v-model="topicType">
                                        <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">
                                                Week 2
                                    <input type="radio" name="week" value="2" v-model="topicType">
                                    <span class="checkmark"></span>
                                </label>
                            </div> 
                            <div class="input-container">
                                <h4 class="input-title">Tanggal Mulai</h4>
                                <p class="input-sub-title">Tentukan tanggal mulai kursus</p>
                            <input type="text" name="startDate" class="regular-input" id="startDate" value="{{$topic->start_date}}" placeholder="Choose Date" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Tanggal Selesai</h4>
                                <p class="input-sub-title">Tentukan tanggal selesai kursus</p>
                                <input type="text" name="endDate" class="regular-input" id="endDate" value="{{$topic->end_date}}" placeholder="Choose Date" required>
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
@endforeach
    <script src="{{ URL('js/vue.js') }}"></script>
    <script>
        new Vue({
            el: '#topic',
            data() {
               return{
                   topicType: '{{$topic->week}}'
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
