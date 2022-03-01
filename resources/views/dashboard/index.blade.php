@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        {{-- <h6 class="h2 text-white d-inline-block mb-0">Default</h6> --}}
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row dashboard-box">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">


                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Tender</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $tender }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-book-bookmark"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Folder</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proyek</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $proyek }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Folder</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Inventaris</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $inventaris }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Folder</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Keuangan</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $keuangan }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Folder</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Lain-Lain</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $lain }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
                                            <i class="ni ni-archive-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Folder</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-text">
            </div>
            <div class="search-box d-flex">

            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .action {
            position: absolute;
            top: 10%;
            right: 5%;
            font-size: 12px;
        }

    </style>
@endsection
@section('js')
    <script>
        // $('#navbar-search-main').addClass('d-none')
        $('#search_input').keyup(function() {
            let value = $(this).val()

            if (value == '') {
                $('.search-text').empty()
                $('.search-box').empty();
            }
            $.ajax({
                url: "/dashboard/searching?file=" + value,
                success: function(data) {
                    $('.search-box').empty();
                    $('.search-text').html('<h2>Hasil Pencarian</h2>')
                    if (data == '') {
                        $('.search-box').html('<h4 class="text-center">Tidak ada data</h4>')
                    } else {
                        let result = ''
                        let icon = ''
                        data.forEach(element => {
                            if (element.file_type == 'doc' || element.file_type == 'docx') {
                                icon = '<i class="fas fa-file-word"></i>'
                            } else if (element.file_type == 'xls' || element.file_type ==
                                'xlsx') {
                                icon = '<i class="fas fa-file-excel text-success"></i>'
                            } else if (element.file_type == 'pdf') {
                                icon = '<i class="fas fa-file-pdf text-danger"></i>'
                            } else if (element.file_type == 'jpg' || element.file_type ==
                                'jepg' ||
                                element.file_type == 'png') {
                                icon = '<i class="fas fa-image text-orange"></i>'
                            } else {
                                icon = '<i class="fas fa-file text-info"></i>'
                            }
                            result += `<div class="col-lg-3 col-md-6">
                                    <div class="action">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu  dropdown-menu-arrow">
                                                <a href="#" class="btn_delete dropdown-item mr-1"
                                                    data-id="${element.id}">
                                                    Delete
                                                </a>
                                                <a href="#" class="btn_rename dropdown-item" data-id="${element.id}"
                                                    data-toggle="modal" data-target="#modal-edit">
                                                    Rename
                                                </a>
                                                <a href="/menu/download_file/${element.id}"
                                                    class="btn_download dropdown-item" data-id="${element.id}">
                                                    Download
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="button" class="btn-icon-clipboard" data-toggle="tooltip"
                                        data-placement="top" title="${element.name_show}">
                                        <div>
                                           ${icon}
                                            <span>${element.name_show}</span>
                                        </div>
                                        <div style="color: #adacac; font-size:14px; margin-left:35px">
                                            <small>${element.tahun}</small>
                                        </div>
                                    </button>
                                </div>`
                        });
                        $('.search-box').html(result)
                    }
                }
            })
        })
    </script>
@endsection
