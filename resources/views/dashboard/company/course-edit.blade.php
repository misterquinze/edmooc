@extends('layouts.template-tutor')

@section('tab-title')
    <title>My Course - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li class="active"><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
    <li><a href="{{ URL('dashboard/revenue') }}"><i class="fa fa-list"></i> <span>Pendapatan</span></a></li>
    <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/company/course-edit.css') }}">

    <section class="content">
        <div id="course">
            <template>
                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Edit Kursus
                    </div>

                    <form action="{{ URL('dashboard/course/'.$course->id.'/edit') }}" method="POST">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">

                            <div class="input-container">
                                <h4 class="input-title">Nama Kursus</h4>
                                <p class="input-sub-title">Beri nama kursus anda sejelas mungkin</p>
                                <input type="text" name="name" class="regular-input" value="{{ $course->name }}" required>
                            </div>
    
                            <div class="input-container">
                                <h4 class="input-title">Deskripsi Kursus</h4>
                                <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                <textarea name="description" class="regular-textarea" required>{{ $course->description }}</textarea>
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
                                <input type="number" name="price" class="regular-input"  value="{{ $course->price }}" required>
                            </div>
                            
                            <div class="input-container">
                                <h4 class="input-title">Kategori Kursus</h4>
                                <p class="input-sub-title">Tentukan kategori kursus</p>
                                <select name="category" class="regular-select">
                                    <option>Pilih kategori</option>
                                    @foreach ($categories as $category)
                                        @if ($category->id == $course->category_id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-container">
                                    <h4 class="input-title">Tutor Kursus</h4>
                                    <p class="input-sub-title">Tentukan Tutor kursus</p>
                                    <select name="tutor" class="regular-select">
                                        <option>Pilih Tutor</option>
                                        @foreach ($tutors as $tutor)
                                            <option value="{{ $tutor->id }}">{{ $tutor->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            {{--<div class="input-container">
                                <h4 class="input-title">Tanggal Mulai</h4>
                                <p class="input-sub-title">Tentukan tanggal mulai kursus</p>
                                <input type="text" name="startDate" class="regular-input" id="startDate" value="{{ $course->start_date }}" placeholder="Choose Date" required>
                            </div>
    
                            <div class="input-container">
                                <h4 class="input-title">Tanggal Selesai</h4>
                                <p class="input-sub-title">Tentukan tanggal selesai kursus</p>
                                <input type="text" name="endDate" class="regular-input" id="endDate" value="{{ $course->end_date }}" placeholder="Choose Date" required>
                            </div>--}}
    
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

    <script>
        new Vue({
            el: '#course',
            data() {
                return {
                    courseType: '{{$course->type}}',
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