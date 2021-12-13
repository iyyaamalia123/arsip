@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">lain-lain</li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $folder->name }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-form">Add New</a>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-neutral dropdown-toggle dropdown-left" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Filters
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        Year &raquo;
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                                        @foreach ($years as $year)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('/lain/filter_file/' . $folder->slug . '?tahun=' . $year) }}">{{ $year }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        File Type &raquo;
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/filter_file/' . $folder->slug . '?file_type=image') }}">Image</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/filter_file/' . $folder->slug . '?file_type=pdf') }}">PDF</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/filter_file/' . $folder->slug . '?file_type=excel') }}">Excel</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/filter_file/' . $folder->slug . '?file_type=word') }}">Word</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/filter_file/' . $folder->slug . '?file_type=lain') }}">Lainnya</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-neutral dropdown-toggle dropdown-left" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Sort
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        Name &raquo;
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/sort_file/' . $folder->slug . '?name=asc') }}">Ascending</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/sort_file/' . $folder->slug . '?name=desc') }}">Descending</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        Year &raquo;
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/sort_file/' . $folder->slug . '?tahun=asc') }}">Ascending</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('/lain/sort_file/' . $folder->slug . '?tahun=desc') }}">Descending</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
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
                        <h3 class="mb-0">{{ $folder->name }}</h3>
                    </div>
                    <div class="card-body">
                        @if ($filter)
                            <div class="d-flex">
                                <h4>Filter {{ $filter }}</h4>
                                <a href="{{ url('/lain/' . $folder->slug) }}" class="btn btn-primary btn-sm ml-3">Reset
                                    Filter</a>
                            </div>
                        @endif
                        <div class="row icon-examples main-box">
                            @forelse ($files as $file)
                                <div class="col-lg-3 col-md-6">
                                    <div class="action">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu  dropdown-menu-arrow">
                                                <a href="#" class="btn_delete dropdown-item mr-1"
                                                    data-id="{{ $file->id }}">
                                                    Delete
                                                </a>
                                                <a href="#" class="btn_rename dropdown-item" data-id="{{ $file->id }}"
                                                    data-toggle="modal" data-target="#modal-edit">
                                                    Rename
                                                </a>
                                                <a href="{{ route('lain.download_file', $file->id) }}"
                                                    class="btn_download dropdown-item" data-id="{{ $file->id }}">
                                                    Download
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="button" class="btn-icon-clipboard" data-toggle="tooltip"
                                        data-placement="top" title="{{ $file->name_show }}">
                                        <div>
                                            @if ($file->file_type == 'doc' || $file->file_type == 'docx')
                                                <i class="fas fa-file-word"></i>
                                            @elseif($file->file_type == 'xls' || $file->file_type == 'xlsx')
                                                <i class="fas fa-file-excel text-success"></i>
                                            @elseif($file->file_type == 'pdf')
                                                <i class="fas fa-file-pdf text-danger"></i>
                                            @elseif($file->file_type == 'jpg' || $file->file_type == 'jepg' ||
                                                $file->file_type == 'png')
                                                <i class="fas fa-image text-orange"></i>
                                            @else
                                                <i class="fas fa-file text-info"></i>
                                            @endif
                                            <span>{{ $file->name_show }}</span>
                                        </div>
                                        <div style="color: #adacac; font-size:14px; margin-left:35px">
                                            <small>{{ $file->tahun }}</small>
                                        </div>
                                    </button>
                                </div>
                            @empty
                                <div class="m-4 w-100">
                                    <h3 class="text-center">Tidak Ada File</h3>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Add File</small>
                            </div>
                            <form role="form" method="POST" action="{{ url('lain/store_file/' . $folder->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" lang="en">
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Year" type="text" id="tahun"
                                            name="tahun">
                                    </div>
                                </div>
                                <div class="form-group mt-3 d-none" id="input_name">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="File Name" type="text" id="name"
                                            name="name">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary my-4">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Name --}}
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Rename File</small>
                            </div>
                            <form role="form" method="POST" id="form_rename" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Year" type="text" id="tahun_edit"
                                            name="tahun">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="File Name" type="text" id="name_edit"
                                            name="name">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary my-4">Rename</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

        .dropdown-menu li {
            position: relative;
        }

        .dropdown-menu .dropdown-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: -7px;
        }

        .dropdown-menu .dropdown-submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover>.dropdown-submenu {
            display: block;
        }

    </style>
@endsection
@section('js')
    <script>
        $('#file').on('change', function(e) {
            var fileName = e.target.files[0].name;
            $('#input_name').removeClass('d-none');
            $('#input_name input').val(fileName)
        })
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Rename Javascript
        $(document).on('click', '.btn_rename', function(e) {
            var id = $(this).data('id');
            $.ajax({
                url: "show_file/" + id,
                success: function(data) {
                    $('#name_edit').val(data.name_show)
                    $('#tahun_edit').val(data.tahun)
                    $('#form_rename').attr('action', 'rename_file/' + id);
                }
            })
        })

        // Delete
        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin menghapus file ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/lain/destroy_file/" + id,
                        type: 'delete',
                        success: function(data) {
                            location.reload()
                            Swal.fire(
                                'Deleted!',
                                'File Anda telah dihapus.',
                                'success'
                            )
                        }
                    })

                }
            })
        })

        $('#search_input').keyup(function() {
            let value = $(this).val()
            let slug = '{{ $folder->slug }}'
            if (value == '') {
                value = 'allresult'
            }
            $.ajax({
                url: "/lain/searching?slug=" + slug + "&file=" + value,
                success: function(data) {
                    $('.main-box').empty();

                    if (data == '') {
                        $('.main-box').html('<h4 class="text-center">Tidak ada data</h4>')
                    } else {
                        console.log(data);
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
                                                <a href="/lain/download_file/${element.id}"
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
                        $('.main-box').html(result)
                    }
                }
            })
        })
    </script>
@endsection
