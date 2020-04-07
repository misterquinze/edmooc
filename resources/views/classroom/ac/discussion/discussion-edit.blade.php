extends('layouts.template-student')

@section('tab-title')
    <title>Edit Diskusi</title>
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
<div id="form-container" class="form-create">
        <div class="form-header">edit Diskusi</div>
      
        <form action="{{ URL('classroom/discussion/'.$discussions->id.'/edit') }}" method="POST">
        
            <div class="form-body">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
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
</div>
@endsection