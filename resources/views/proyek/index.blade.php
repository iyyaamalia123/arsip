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
                                <li class="breadcrumb-item active" aria-current="page">Proyek</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-form">New Folder</a>
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
                        <h3 class="mb-0">Proyek</h3>
                    </div>
                    <div class="card-body">
                        <div class="row icon-examples main-box">
                            @foreach ($folders as $folder)
                                <div class="col-lg-3 col-md-6">
                                    <div class="action">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu  dropdown-menu-arrow">
                                                <a href="#" class="btn_delete dropdown-item mr-1"
                                                    data-id="{{ $folder->id }}">
                                                    Delete
                                                </a>
                                                <a href="#" class="btn_rename dropdown-item" data-id="{{ $folder->id }}"
                                                    data-toggle="modal" data-target="#modal-edit">
                                                    Rename
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="{{ url($folder->url_folder) }}" class="btn-icon-clipboard">
                                        <div class="">
                                            <i class="ni ni-folder-17 text-warning"></i>
                                            <span>{{ $folder->name }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Add Folder</small>
                            </div>
                            <form role="form" method="POST" action="{{ url('proyek/store_folder/' . $id_menu) }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-folder-17"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Folder Name" type="text" id="name"
                                            name="name">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Create</button>
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
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Rename Folder</small>
                            </div>
                            <form role="form" id="form_rename" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-folder-17"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Folder Name" type="text" id="name_edit"
                                            name="name">
                                    </div>
                                </div>
                                <div class="text-center">
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

    </style>
@endsection
@section('js')
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
                url: "proyek/show/" + id,
                success: function(data) {
                    $('#name_edit').val(data.name)
                    $('#form_rename').attr('action', 'proyek/rename_folder/' + id);
                }
            })
        })

        // Delete
        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin menghapus folder ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/proyek/destroy_folder/" + id,
                        type: 'delete',
                        success: function(data) {
                            location.reload()
                            Swal.fire(
                                'Deleted!',
                                'Folder Anda telah dihapus.',
                                'success'
                            )
                        }
                    })

                }
            })
        })


        $('#search_input').keyup(function() {
            let value = $(this).val()
            if (value == '') {
                value = 'allresult'
            }
            $.ajax({
                url: "/proyek/searching?folder=" + value,
                success: function(data) {
                    $('.main-box').empty();

                    if (data == '') {
                        $('.main-box').html('<h4 class="text-center">Tidak ada data</h4>')
                    } else {
                        let result = ''
                        data.forEach(element => {
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
                                            </div>
                                        </div>

                                    </div>
                                    <a href="${element . url_folder}" class="btn-icon-clipboard">
                                        <div class="">
                                            <i class="ni ni-folder-17 text-warning"></i>
                                            <span>${element.name}</span>
                                        </div>
                                    </a>
                                </div>`
                        });
                        $('.main-box').html(result)
                    }
                }
            })
        })
    </script>
@endsection
