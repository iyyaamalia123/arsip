@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        {{-- <h6 class="h2 text-white d-inline-block mb-0">Tender</h6> --}}
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">Tender</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row justify-content-center">
            <div class=" col ">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Create Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control" type="text" value="{{ old('name') }}" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-control-label">NIK</label>
                                <input class="form-control" type="number" name="nik" value="{{ old('nik') }}"
                                    id="email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Tempat Lahir</label>
                                <input class="form-control" type="text" value="{{ old('tempat lahir') }}"
                                    name="tempat lahir" id="tempat lahir">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" value="{{ old('date') }}"
                                    name="date" id="date">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Alamat</label>
                                <input class="form-control" type="text" value="{{ old('alamat') }}"
                                    name="alamat" id="alamat">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Agama</label>
                                <input class="form-control" type="text" value="{{ old('agama') }}"
                                    name="agama" id="agama">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Nomor Telephone</label>
                                <input class="form-control" type="number" value="{{ old('no telp') }}"
                                    name="no telp" id="no telp">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Nomor Darurat</label>
                                <input class="form-control" type="number" value="{{ old('no darurat') }}"
                                    name="no darurat" id="no darurat">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Gender</label>
                                <br>
                                <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Perempuan</label>
                                  </div>
                                  <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Laki-laki</label>
                                  </div>
                            <br>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Status</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline1">Menikah</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Single</label>
                                  </div>
                            </div>
                    <div class="card-body">
                        <div class="form">
                            <button type="submit" class="btn btn-outline-primary">Tambah</button>
                            
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>              
@endsection