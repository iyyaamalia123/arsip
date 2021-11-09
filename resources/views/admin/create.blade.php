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
                                <li class="breadcrumb-item active" aria-current="page">Admin</li>
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
                        <h3 class="mb-0">Create Admin</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control" type="text" value="{{ old('name') }}" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                    id="email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <input class="form-control" type="password" value="{{ old('password') }}"
                                    name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-control-label">Status</label>
                                <br>
                                <label class="custom-toggle">
                                    <input type="checkbox" checked name="status" id="status">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
