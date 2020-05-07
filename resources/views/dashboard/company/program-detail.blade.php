@extends('layouts.template-student')

@section('tab-title')
    <title>Detail Program</title>
@endsection

@section('menu')
<li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
<li><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Professional</span></a></li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>{{$program->name}}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @foreach($accourse as $ac)        
        <li><a href=""><i class="fa fa-circle-o"></i>{{$ac->name}}</a></li>
        @endforeach
    </ul>
</li>
<li><a href="{{ URL('dashboard/revenue') }}"><i class="fa fa-list"></i> <span>Pendapatan</span></a></li>
{{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li> --}}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/company/program-detail.css') }}"> 
    <link rel="stylesheet" href="{{ URL('css/dashboard/company/course.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <section class="content">
        <div id="course">
            <template>
                <div id="display-container">
                    <div class="course-title">
                        <h2 class="course-name">{{ $program->name }}</h2>
                    </div>
                    <hr>
                    <div class="course-content">    
                        <div class="gridspan">
                            <div class="left-section">
                                <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                            </div>

                            <div class="middle-section">
                                
                                <div class="course-detail-title">Deskripsi</div>
                                <div class="course-detail-value">{{ $program->description }}</div>
                                

                                

                            </div>
                            <div class="right-section">
                                <div class="course-detail-title">Persyaratan</div>
                                <div class="course-detail-value">{{ $program->requirement }}</div>
                                <div class="course-detail-title">Gelar Yang Didapat</div>
                                <div class="course-detail-value">{{ $program->degree }}</div>
                                {{--<div class="course-detail-title">Institusi</div>
                                <div class="course-detail-value">{{ $course->company->name }}</div>

                                <div class="course-detail-title">Mulai Kursus</div>
                                <div class="course-detail-value">{{ $course->start_date }}</div>

                                <div class="course-detail-title">Kursus Berakhir</div>
                                <div class="course-detail-value">{{ $course->end_date }}</div>--}}

                            </div>
                        </div>    
                    </div>

                    <div class="topic-content">
                        <div class="topic-content-header gridspan">
                            <h3 class="topic-title">Kursus</h3>
                            <button class="add-topic-button" @click.prevent="changeType('create')">Tambah Kursus</button>
                            {{--<button type="button" class="add-topic-button" id="add-item" data-item-id="1">Tambah Kursus</button>--}}
                        </div>
                        <div class="topic-list gridspan">
                            <div class="left-section header">Nama Kursus</div>
                            <div class="middle-section header">Status</div>
                            <div class="right-section header">Opsi</div>
                        </div>
                        @foreach($accourse as $ac)
                            <div class="topic-list gridspan">
                                <div class="left-section">
                                    <a href="" class="topic-name">
                                        {{$ac->name}}
                                    </a>
                                </div>
                                <div class="middle-section">
                                    <input type="checkbox" data-id="{{ $ac->id }}" name="status" class="js-switch" {{ $ac->status == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="right-section">
                                    <span @click.prevent="changeType('edit',{{ $ac->id }})" class="edit-btn">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    
                                    <span class="delete-btn" onclick="deleteTopic({{ $ac->id }})">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                            <form class="form-delete" id="delete-{{ $ac->id }}" action="{{ route('company.academic.delete', [$ac->id]) }} "  method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        @endforeach
                    </div>
                </div>
                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Buat Kursus Baru
                    </div>
                    
                    <form action="{{ route('company.academic.create', [$program->id]) }}" method="POST">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="input-container">
                                <h4 class="input-title">Judul Kursus</h4>
                                <p class="input-sub-title">Beri Judul Materi</p>
                                <input type="text" name="name" class="regular-input" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Deskripsi Kursus</h4>
                                <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                <textarea name="description" class="regular-textarea" required></textarea>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Tentukan Passing Grade</h4>
                                <p class="input-sub-title">menentukan syarat nilai kelulusan kursus</p>
                                <input type="number" name="passing_grade" class="regular-input" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Biaya Kursus</h4>
                                <p class="input-sub-title">Tentukan biaya kursus</p>
                                <input type="number" name="price" class="regular-input" required>
                            </div>
                            <div id="category" class="input-container">
                                <h4 class="input-title">Kategori Kursus</h4>
                                <p class="input-sub-title">Tentukan kategori kursus</p>
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
                @foreach($accourse as $ac)
                <div id="form-edit-{{ $ac->id }}" class="form-create form-edit">
                    <div class="form-header">Edit Kursus</div>
                    <form action="{{ route('company.academic.update', [$ac->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">

                        <div class="form-body">
                            <div class="input-container">
                                <h4 class="input-title">Judul Kursus</h4>
                                <p class="input-sub-title">Beri Judul Kursus</p>
                                <input type="text" name="name" class="regular-input" value="{{ $ac->name }}" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Deskripsi Kursus</h4>
                                <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                <textarea name="description" class="regular-textarea" required>{{ $ac->description }}</textarea>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Tentukan Passing Grade</h4>
                                <p class="input-sub-title">menentukan syarat nilai kelulusan kursus</p>
                                <input type="number" name="passing_grade" class="regular-input" required>
                            </div>
                            <div class="input-container">
                                <h4 class="input-title">Biaya Kursus</h4>
                                <p class="input-sub-title">Tentukan biaya kursus</p>
                                <input type="number" name="price" class="regular-input" required>
                            </div>
                            <div id="category" class="input-container">
                                <h4 class="input-title">Kategori Kursus</h4>
                                <p class="input-sub-title">Tentukan kategori kursus</p>
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
            @endforeach
                <!-- modal Tambah Topik -->
                {{--<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="modal-header">
                            <h5 class="modal-title" id="edit-modal-label">Tambah Kursus</h5>
                        
                            </div>
                            <div class="modal-body" id="attachment-body-content">
                                <form id="form-container" class="form-horizontal" method="POST" action="{{ route('tutor.topic.create', [$course->id]) }}">
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                    <!-- name -->
                                        <div class="input-container">
                                            <h4 class="input-title">Judul Materi</h4>
                                            <p class="input-sub-title">Beri Judul Materi</p>
                                            
                                            <input type="text" name="name" class="regular-input" id="modal-input-name" required autofocus>
                                        </div>
                                    
                                    <!-- description -->
                                        <div class="input-container">
                                            <h4 class="input-title">Deskripsi Topik</h4>
                                            <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                           
                                            <textarea name="description" class="regular-textarea" id="modal-input-description"required></textarea>
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
                </div>--}}
            </template>
        </div>  
    </section>

    <script src="{{ URL('js/vue.js') }}"></script>

    <script>
        new Vue({
            el: '#course',
            data() {
                return {
                    courseType: 'free',
                }
            },
            methods: {
                changeType(type,id){
                    console.log(type)
                    console.log(id)
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
        $("#filterDate").daterangepicker()
        $("#startDate").datepicker()
        $("#endDate").datepicker()

        function deleteTopic(id) {
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
            
            var name = row.children(".name").text();
            var description = row.children(".description").text();
            // fill the data in the input fields
           
            $("#modal-input-name").val(name);
            $("#modal-input-description").val(description);

        })
            
        
        // on modal hide
        $('#add-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        })

        
    })
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
                url: '/dashboard/accourse/changeStatus',
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