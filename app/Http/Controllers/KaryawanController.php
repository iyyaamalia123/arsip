<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $karyawan                     = New Karyawan();
        $karyawan->nama               = $request->name;
        $karyawan->nik                = $request->nik; 
        $karyawan->tempat_lahir       = $request->tempat_lahir;
        $karyawan->tanggal_lahir      = $request->date;
        $karyawan->alamat             = $request->alamat;
        $karyawan->agama              = $request->agama;
        $karyawan->no_telp            = $request->no_telp;
        $karyawan->no_darurat         = $request->no_darurat;
        $karyawan->gender             = $request->gender;
        $karyawan->status             = $request->status;
        // kiri punyanya si table           kanan data yang kita kirim dari form
        $karyawan->save();           

    return redirect(route('karyawan'));
    }

    public function edit($id)
    {
        $data = Karyawan::find($id);
        return view('karyawan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $karyawan                     = Karyawan::find($id);
        $karyawan->nama               = $request->name;
        $karyawan->nik                = $request->nik; 
        $karyawan->tempat_lahir       = $request->tempat_lahir;
        $karyawan->tanggal_lahir      = $request->date;
        $karyawan->alamat             = $request->alamat;
        $karyawan->agama              = $request->agama;
        $karyawan->no_telp            = $request->no_telp;
        $karyawan->no_darurat         = $request->no_darurat;
        $karyawan->gender             = $request->gender;
        $karyawan->status             = $request->status;
        
        if ( $karyawan->update()) {
            return redirect(route('karyawan'))->with('success', 'Berhasil Merubah Data Karyawan');;
        }else{
            return redirect(route('karyawan'))->with('error', 'Gagal Merubah Data Karyawan');;
        }
        
    }

    public function destroy($id)
     {
         $data = Karyawan::find($id);
         if ( $data->delete()) {
            return redirect(route('karyawan'))->with('success', 'Berhasil Menghapus Data Karyawan');;
         } else {
            return redirect(route('karyawan'))->with('error', 'Gagal Menghapus Data Karyawan');;
         }
         
        
     }
}
