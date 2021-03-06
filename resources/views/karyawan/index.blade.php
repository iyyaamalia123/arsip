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
                                                <th scope="col" class="sort" data-sort="alamat">Agama</th>
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
                                                        {{ $karyawan->nama }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->nik }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->tempat_lahir }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->tanggal_lahir }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->alamat }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->agama }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->no_telp }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->no_darurat }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->gender }}
                                                    </td>
                                                    <td>
                                                        {{ $karyawan->status }}
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
                                                                    href="{{ url('karyawan/edit/' . $karyawan->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ url('karyawan/destroy/' . $karyawan->id) }}">Delete</a>
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
            url: "/karyawan/destroy/" + id,
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

    $('#search_input').keyup(function() {
        let value = $(this).val()
        if (value == '') {
            value = 'allresult'
        }
        console.log(value);
        $.ajax({
                url: "/karyawan/searching?search=" + value,
                success: function(data) {
                    $('.list').empty();
                    if (data == '') {
                        $('.list').html('<td class="text-center">Tidak ada data</td>')
                    } else {
                        let result = ''
                        let status = ''
                        data.forEach(element => {


                        result += `<tr>
                                        <td>
                                           ${element.nama}
                                        </td>
                                        <td>
                                          ${element.nik}
                                        </td>
                                        <td>
                                           ${element.tempat_lahir}
                                        </td>
                                        <td>
                                           ${element.tanggal_lahir}
                                        </td>
                                        <td>
                                           ${element.alamat}
                                        </td>
                                        <td>
                                           ${element.agama}
                                        </td>
                                        <td>
                                           ${element.no_telp}
                                        </td>
                                        <td>
                                           ${element.no_darurat}
                                        </td>
                                        <td>
                                           ${element.gender}
                                        </td>
                                        <td>
                                           ${element.status}
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
                                                        href="/karyawan/edit/${element.id}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="/karyawan/destroy/${element.id}">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>`
                    });
                    $('.list').html(result)
                }
            }
        })
    })
</script>

@endsection
