@extends('layouts.template-student')

@section('tab-title')
    <title>Settings - EdMOOC</title>
@endsection

@section('menu')
    @if($userLogin->role == 'student')
        <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('dashboard/favorite') }}"><i class="fa fa-heart"></i> <span>Favorit Saya</span></a></li>
        <li><a href="{{ URL('dashboard/course/me') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
        <li><a href="{{ URL('dashboard/transaction') }}"><i class="fa fa-list"></i> <span>Riwayat Transaksi</span></a></li>
        <li class="header">DAFTAR KURSUS</li>
        <li><a href="{{ URL('course') }}"><i class="fa fa-book"></i> <span>Katalog</span></a></li>
    @elseif($userLogin->role == 'company')
        <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
        <li><a href="{{ URL('dashboard/revenue') }}"><i class="fa fa-list"></i> <span>Pendapatan</span></a></li>
    @elseif($userLogin->role == 'tutor')
        <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('dashboard/list/course') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>  
    @endif
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/settings.css') }}">
    <link rel="stylesheet" href="{{ URL('css/file-upload.css') }}">

    <section class="content-header">
        <h1>
            Pengaturan
        </h1>
    </section>

    <section class="content">
        <form action="{{ URL('dashboard/settings') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group"><label>Unggah Gambar</label></div>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' name="photo" onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <h3>Drag and drop a file or select add Image</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                        </div>
                        <img class="file-upload-image" src="#" alt="your image" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $userLogin->name }}">
                    </div>
                    <div class="form-group">
                        <label>Kata Sandi Baru</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
       
       

    </section>

    <script src="{{ URL('js/file-upload.js') }}"></script>
@endsection