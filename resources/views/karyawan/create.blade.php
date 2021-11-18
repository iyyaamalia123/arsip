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
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="/karyawan/create" class="btn btn-sm btn-neutral">New</a>
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
                        <h3 class="mb-0">Tambah Data Kryawan</h3>
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">&emsp; Nama</label>
                            <input class="form-control" type="text" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-search-input" class="form-control-label">&emsp; NIK</label>
                            <input class="form-control" type="number" id="example-search-input">
                        <div class="form-group">
                            <label for="example-url-input" class="form-control-label">&emsp; Tempat, Tanggal Lahir</label>
                            <input class="form-control" type="date"  id="example-url-input">
                        </div>
                        <div class="form-group">
                            <label for="example-email-input" class="form-control-label">&emsp; Alamat</label>
                            <input class="form-control" type="text,number" id="example-email-input">
                        </div>
                        <div class="form-group">
                            <label for="example-password-input" class="form-control-label">&emsp; Agama</label>
                            <input class="form-control" type="text" value="password" id="example-password-input">
                        </div>
                        <div class="form-group">
                            <label for="example-datetime-local-input" class="form-control-label">&emsp; Nomor Telephone</label>
                            <input class="form-control" type="number" id="example-datetime-local-input">
                        </div>
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">&emsp;Nomor Telephone Darurat</label>
                            <input class="form-control" type="Number" id="example-date-input">
                        </div>
                        <div>
                        <p for="example-password-input" class="form-control-label">&emsp; Status</p>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">&emsp;
                            <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">&emsp;
                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                          </div>
                          <div>
                            <div id="map-default" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 600px;"></div>
                          <p for="example-password-input" class="form-control-label">&emsp; Gender</p>
                          <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">&emsp;
                            <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">&emsp;
                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                          </div>
                        </div>
                        
                    </form>
                    <div class="card-body">
                        <div class="form">
                            <button type="button" class="btn btn-outline-primary">Tambah</button>
                            <div class="table-responsive">
                                
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>              
@endsection