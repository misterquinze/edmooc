@extends('layouts.template-tutor')

@section('tab-title')
    <title>Edit Program - EdMOOC</title>
@endsection

@section('menu')
<li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
<li><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Professional</span></a></li>
<li class="active"><a href="{{ URL('dashboard/company/program') }}"><i class="fa fa-graduation-cap"></i> <span>Akademik</span></a></li>
<li><a href="{{ URL('dashboard/revenue') }}"><i class="fa fa-list"></i> <span>Pendapatan</span></a></li>
    {{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li> --}}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/company/course-edit.css') }}">

    <section class="content">
        <div id="course">
            <template>
                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Edit Program
                    </div>

                    <form action="{{ URL('dashboard/program/' .$program->id. '/edit') }}" method="POST">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="input-container">
                                <h4 class="input-title">Nama Program</h4>
                                <p class="input-sub-title">Beri nama kursus anda sejelas mungkin</p>
                                <input type="text" name="name" class="regular-input" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Deskripsi Program</h4>
                                <p class="input-sub-title">Beri deskripsi program anda sejelas mungkin</p>
                                <textarea name="description" class="regular-textarea" required></textarea>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Gelar Program</h4>
                                <p class="input-sub-title">Beri gelar yang didapatkan setelah menyelesaikan kursus</p>
                                <input type="text" name="degree" class="regular-input" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Estimasi Waktu</h4>
                                <p class="input-sub-title">Beri keterangan estimasi yang dibutuhkan untuk menyelesaikan program</p>
                                <textarea type="text" name="estimate" class="regular-input" required></textarea>
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

    <script>
        new Vue({
            el: '#course',
            
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