@extends('layouts.template-tutor')

@section('tab-title')
    <title>Program - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Professional</span></a></li>
    
    <li class="active"><a href="{{ URL('dashboard/company/program') }}"><i class="fa fa-graduation-cap"></i> <span>Akademik</span></a></li>
    <li><a href="{{ URL('dashboard/revenue') }}"><i class="fa fa-list"></i> <span>Pendapatan</span></a></li>
    {{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li> --}}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/company/program.css') }}">
    
    <link rel="
    stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <section class="content">
        <div id="program">
            <template>
                <div id="display-container">
                    <div class="gridspan">
                        <h3 class="title">Program Akademik</h3>
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
                                        <form class="search-group" action="/dashboard/program/search" method="GET">
                                            <span>
                                                <input type="text" name="search" class="search-input" placeholder="Search program name">
                                                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                                            </span>
                                            
                                        </form>
                                    </div>
                                </div>
            
                            </div>
                            
                            <div class="right-section">
                                {{--@foreach ($program as $p)
                                    <a href="{{ route ('program.detail', [$p->id])}} ">  
                                    <div class="course-list ">
                                        <div class="top-section gridspan">
                                            <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                                            <div class="course-detail">
                                                <h3 class="course-name">{{ $p->name }}</h3> 
                                                <h5 class="course-description">
                                                    <p>{{str_limit($p->description), 10 }} 
                                                </p>
                                                </h5> 
                                            </div>
                                        </div>
                                        <div class="bottom-section gridspan">
                                            <div class="col-left">
                                                
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
                                    </a>
                                    <form class="form-delete" id="delete-{{ $p->id }}" action="{{ URL('dashboard/program/'.$p->id.'/delete') }}"  method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                @endforeach--}}
                                <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th>Nama Program</th>
                                          <th>Jumlah Kursus</th>
                                          <th>Status</th>
                                          <th>Opsi</th>
                                       </tr> 
                                    </thead>
                                    <tbody>
                                       @foreach($program as $p)
                                          <tr>
                                             <td><a href="{{ route ('program.detail', [$p->id])}} "> {{ $p->name }}</a></td>
                                             <td>{{ $p->ac_course->count() }}</td>
                                             <td>  <input type="checkbox" data-id="{{ $p->id }}" name="status" class="js-switch" {{ $p->status == 1 ? 'checked' : '' }}></td>
                                             <td>
                                                <span class="delete-btn" onclick="deleteProgram({{ $p->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                <a href="{{ URL('dashboard/program/'.$p->id.'/edit') }}" class="edit-btn">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form class="form-delete" id="delete-{{ $p->id }}" action="{{ URL('dashboard/program/'.$p->id.'/delete') }}"  method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                             </td>
                                          </tr>
                                       @endforeach
                                    </tbody>
                                </table>
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
    {{-- <script src="{{ URL('js/sweetalert.min.js') }}"></script> --}}

    <script>
        new Vue({
            el: '#program',
            
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
  
    <script>
        $(function() 
        {
            $('.js-switch').change(function() 
            {
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var id = $(this).data('id'); 
          
                $.ajax({
                type: "GET",
                dataType: "json",
                url: '/dashboard/program/changeStatus',
                data: {'status': status, 'id': id},
                success: function(data){
                  console.log(data.success)
                }
                });
            })
        })
        </script>
        <script>
            let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    
            elems.forEach(function(html) {
                let switchery = new Switchery(html,  { size: 'small' });
            });
        </script>
@endsection