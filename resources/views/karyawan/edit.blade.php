@extends('layouts.app')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        {{-- <h6 class="h2 text-white d-inline-block mb-0">Data Karyawan</h6> --}}
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">Data Karyawan</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
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
                        <h3 class="mb-0">Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('karyawan.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control" type="text" value="{{ $data->name }}" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="nik" class="form-control-label">NIK</label>
                                <input class="form-control" type="number" name="nik" value="{{ $data->nik }}" id="nik">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                <input class="form-control" type="text" value="{{ $data->tempat_lahir }}" name="tempat_lahir" id="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label for="date" class="form-control-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" value="{{ $data->date }}" name="date" id="date">
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="form-control-label">Alamat</label>
                                <input class="form-control" type="text" value="{{ $data->alamat }}" name="alamat" id="alamat">
                            </div>
                            <div class="form-group">
                                <label for="agama" class="form-control-label">Agama</label>
                                <input class="form-control" type="text" value="{{ $data->agama }}" name="agama" id="agama">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Nomor Telephone</label>
                                <input class="form-control" type="number" value="{{ $data->no_telp }}" name="no_telp" id="no telp">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Nomor Darurat</label>
                                <input class="form-control" type="number" value="{{ $data->no_darurat }}" name="no_darurat" id="no darurat">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="gender" class="form-control-label">Gender</label>
                            <option value="perempuan" {{ $data->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                <option value="laki-laki" {{ $data->gender == 'kali-laki' ? 'selected' : '' }}>Laki-laki
                                </option>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="status" class="form-control-label">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="menikah">Menikah</option>
                                    <option value="single">Single</option>
                                </select>
                                </div>
                        
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
