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
                        <h3 class="mb-0">Data Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <div>
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="nama">Nama</th>
                                                <th scope="col" class="sort" data-sort="nik">NIK</th>
                                                <th scope="col" class="sort" data-sort="tempat_lahir">Tempat Lahir</th>
                                                <th scope="col" class="sort" data-sort="tanggal_Lahir">Tanggal Lahir</th>
                                                <th scope="col" class="sort" data-sort="alamat">Alamat</th>
                                                <th scope="col" class="sort" data-sort="no_telp">Nomor Telephone</th>
                                                <th scope="col" class="sort" data-sort="no_darurat">Nomor Darurat</th>
                                                <th scope="col" class="sort" data-sort="gender">Gender</th>
                                                <th scope="col" class="sort" data-sort="status">Status</th>
                                                <th scope="col" class="sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($karyawans as $karyawan)
                                                <tr>
                                                    <td>
                                                        {{ $karyawan->Nama }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->NIK }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->TempatLahir }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->TanggalLahir }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->Agama }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->NoTelp }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->NoDarurat }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->Gender }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->Status }}
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
