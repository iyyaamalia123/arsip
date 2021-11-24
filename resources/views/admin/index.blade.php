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
                        <a href="{{ route('admin.create') }}" class="btn btn-sm btn-neutral">New</a>
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
                        <h3 class="mb-0">Admin</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <div>
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="name">Nama</th>
                                                <th scope="col" class="sort" data-sort="budget">Email</th>
                                                <th scope="col" class="sort" data-sort="status">Level</th>
                                                <th scope="col" class="sort" data-sort="status">Status</th>
                                                <th scope="col" class="sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($admins as $admin)
                                                <tr>
                                                    <td>
                                                        {{ $admin->name }}
                                                    </td>
                                                    <td>
                                                        {{ $admin->email }}
                                                    </td>
                                                    <td>
                                                        {{ $admin->level }}
                                                    </td>
                                                    <td>
                                                        @if ($admin->status == true)
                                                            <span class="badge badge-dot mr-4">
                                                                <i class="bg-success"></i>
                                                                <span class="status">Active</span>
                                                            </span>
                                                        @else
                                                            <span class="badge badge-dot mr-4">
                                                                <i class="bg-danger"></i>
                                                                <span class="status">Not Active</span>
                                                            </span>
                                                        @endif
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
                                                                <a class="dropdown-item"
                                                                    href="{{ url('admin/edit/' . $admin->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ url('admin/destroy/' . $admin->id) }}">Delete</a>
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
@section('js')
    <script>
        $('.delete_data').click(function() {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "/admin/destroy/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function() {
                    alert("Sukses");
                    window.location.reload();
                }
            })
        })
    </script>

@endsection
