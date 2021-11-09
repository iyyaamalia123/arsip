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
                                <li class="breadcrumb-item active" aria-current="page">Tender</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
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
                        <h3 class="mb-0">Tender</h3>
                    </div>
                    <div class="card-body">
                        <div class="row icon-examples">
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ url('tender/detail') }}" class="btn-icon-clipboard">
                                    <div>
                                        <i class="ni ni-folder-17"></i>
                                        <span>Folder</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ url('tender/detail') }}" class="btn-icon-clipboard">
                                    <div>
                                        <i class="ni ni-folder-17"></i>
                                        <span>Folder</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <button type="button" class="btn-icon-clipboard">
                                    <div>
                                        <i class="ni ni-folder-17"></i>
                                        <span>Folder</span>
                                    </div>
                                </button>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <button type="button" class="btn-icon-clipboard">
                                    <div>
                                        <i class="ni ni-folder-17"></i>
                                        <span>Folder</span>
                                    </div>
                                </button>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <button type="button" class="btn-icon-clipboard">
                                    <div>
                                        <i class="ni ni-folder-17"></i>
                                        <span>Folder</span>
                                    </div>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
