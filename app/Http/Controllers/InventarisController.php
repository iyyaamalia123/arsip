<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InventarisController extends Controller
{
   
    // FOLDER
    // Menampilkan tampilan awal menu inventaris
    public function index()
    {
        $menu = Menu::where('name', 'Inventaris')->first();
        $id_menu = $menu->id;
        $folders = Folder::where('id_menu', $id_menu)->get();
        return view('inventaris.index', compact('id_menu', 'folders'));
    }

    // Menampilkan detail folder
    public function detail_folder($slug)
    {
        $folder = Folder::where('slug', $slug)->first();
        $files = File::where('id_folder', $folder->id)->orderBy('name_show', 'asc')->get();
        $years = range(Carbon::now()->year, 2010);
        $filter = null;
        return view('inventaris.detail', compact('folder', 'files', 'years', 'filter'));
    }

    //  Memasukkan folder baru ke database
    public function store_folder($id_menu, Request $request)
    {
        $cek_nama = Folder::where('name', $request->name)->get();

        if ($cek_nama->isEmpty()) {
            $folder = New Folder();
            $folder->id_admin   = Auth::user()->id;
            $folder->id_menu    = $id_menu;
            $folder->name       = $request->name;
            $folder->slug       = Str::slug($request->name);
            $folder->url_folder = '/inventaris/'.Str::slug($request->name);
            $folder->is_main    = true;
            $folder->save();

            return redirect()->route('inventaris.index')->with('success', 'Berhasil Membuat Folder');
        }else{
            return redirect()->route('inventaris.index')->with('error', 'Nama folder sudah ada, gunakan nama lain!');
        }
       
    }

    // Menampilkan data Folder berdasarkan ID
    public function show($id)
    {
        $folder = Folder::find($id);

        return $folder;
    }

    // Merename Folder
    public function rename_folder($id, Request $request)
    {
        $cek_nama = Folder::where('name', $request->name)->get();

        if ($cek_nama->isEmpty()) {
            $folder = Folder::find($id);
            $folder->name       = $request->name;
            $folder->slug       = Str::slug($request->name);
            $folder->url_folder = '/inventaris/'.Str::slug($request->name);
            $folder->save();
            return redirect()->route('inventaris.index')->with('success', 'Berhasil Merubah Nama Folder');
        }else{
            return redirect()->route('inventaris.index')->with('error', 'Nama folder sudah ada, gunakan nama lain!');
        }
    }

    // Menghapus Folder
    public function destroy_folder($id)
    {
        $folder = Folder::find($id);
        $folder->delete();
    }

    // FILE
    // Menambah File
    public function store_file($id_folder, Request $request)
    {
        $cek_nama   = File::where('name_show', $request->name)->get();
        $folder     = Folder::find($id_folder);
        $file_data = $request->file('file');
        if ($cek_nama->isEmpty()) {
            $data = New File();
            $data->id_admin   = Auth::user()->id;
            $data->id_folder  = $id_folder;
            $data->name_show  = $request->name;
            $data->tahun      = $request->tahun;
            if ($file_data) {
                $filename = time() .'-'.$file_data->getClientOriginalName();
                $file_data->storeAs('public/file', $filename);
                $data->name         = $filename;
                $data->url_file     = 'storage/file/'.$filename;
                $data->file_type    = Str::lower($file_data->getClientOriginalExtension());
            }
            $data->save();

            return redirect('/inventaris/'.$folder->slug)->with('success', 'Berhasil Membuat File!');
        }else{
            return redirect()->back()->with('error', 'Nama file sudah ada, gunakan nama lain!');
        }
       
    }

     // Menampilkan data File berdasarkan ID
     public function show_file($id)
     {
         $file = File::find($id);
 
         return $file;
     }

     
    // Merename File
    public function rename_file($id, Request $request)
    {
        $cek_nama = File::where('name', $request->name)->get();

        if ($cek_nama->isEmpty()) {
            $file = File::find($id);
            $file->name_show    = $request->name;
            $file->tahun        = $request->tahun;
            $file->save();
            return redirect()->back()->with('success', 'Berhasil Merubah Nama File');
        }else{
            return redirect()->back()->with('error', 'Nama File sudah ada, gunakan nama lain!');
        }
    }

    // Menghapus File
    public function destroy_file($id)
    {
        $file = File::find($id);
        $file->delete();
    }

    //   Download File
    public function download_file($id)
    {
        $file = File::find($id); 
        $filePath = public_path("storage/file/".$file->name);

        return response()->download($filePath);
    }

    //   Filter File
    public function filter_file($slug, Request $request)
    {
        $folder = Folder::where('slug', $slug)->first();
        $years  = range(Carbon::now()->year, 2010);
        if ($request->tahun) {
            $files  = File::where('id_folder', $folder->id)->where('tahun', $request->tahun)->get();
            $filter = 'Tahun '. $request->tahun;
        } else if($request->file_type){
            $files  = File::where('id_folder', $folder->id);
            if ($request->file_type == 'image') {
                $files  = $files->whereIn('file_type', ['jpg', 'jpeg'])->get();
            }else if($request->file_type == 'pdf') {
                $files  = $files->where('file_type', 'pdf')->get();
            }else if($request->file_type == 'word') {
                $files  = $files->whereIn('file_type', ['doc', 'docx'])->get();
            }else if($request->file_type == 'excel') {
                $files  = $files->whereIn('file_type', ['xls', 'xlxs'])->get();
            }else{
                $files->whereNotIn('file_type', ['xls', 'xlxs', 'jpg', 'jpeg', 'doc', 'docx', 'pdf'])->get();
            }
            $filter = 'file type '. $request->file_type;
        }else{
            $files = File::where('id_folder', $folder->id)->get();
            $filter = 'Error';
        }
        return view('inventaris.detail', compact('folder', 'files', 'years', 'filter'));
    }

    // Sorting File
    public function sort_file($slug, Request $request)
    {
        $folder = Folder::where('slug', $slug)->first();
        $years  = range(Carbon::now()->year, 2010);
        $files  = File::where('id_folder', $folder->id);
        if ($request->tahun) {
            if ($request->tahun == 'asc') {
                $files = $files->orderBy('tahun', 'asc')->get();
                $filter = 'Tahun Ascending';
            }else{
                $files = $files->orderBy('tahun', 'desc')->get();
                $filter = 'Tahun Descending';
            }
        } else if($request->name){
            if ($request->name == 'asc') {
                $files = $files->orderBy('name_show', 'asc')->get();
                $filter = 'Name Ascending';
            }else{
                $files = $files->orderBy('name_show', 'desc')->get();
                $filter = 'Name Descending';
            }
        }else{
            $filter = 'Error';
        }
        return view('inventaris.detail', compact('folder', 'files', 'years', 'filter'));
    }

}