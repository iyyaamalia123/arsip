<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        // return $request;
        $karyawan                     = New karyawan();
        $karyawan->nama               = $request->name;
        $karyawan->nik                = $request->nik;
        $karyawan->tempat_lahir       = $request->tempat_lahir;
        $karyawan->tgl_lahir          = $request->date;
        $karyawan->alamat             = $request->alamat;
        $karyawan->agama              = $request->agama;
        $karyawan->no_trlp            = $request->no_telp;
        $karyawan->no_darurat         = $request->no_darurat;
       
        if ($karyawan->gender == 'Menikah' ) 
        $karyawan->save();           

    return redirect(route('karyawan'));
}
}

