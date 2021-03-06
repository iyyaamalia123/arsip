<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $ch;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu_tender    = Menu::where('name', 'Tender')->first();
        $tender         = Folder::where('id_menu', $menu_tender->id)->count();
        
        $menu_proyek    = Menu::where('name', 'Proyek')->first();
        $proyek         = Folder::where('id_menu', $menu_proyek->id)->count();

        $menu_inventaris    = Menu::where('name', 'Inventaris Perusahaan')->first();
        $inventaris         = Folder::where('id_menu', $menu_inventaris->id)->count();

        $menu_keuangan    = Menu::where('name', 'Keuangan')->first();
        $keuangan         = Folder::where('id_menu', $menu_keuangan->id)->count();

        $menu_lain    = Menu::where('name', 'Lain-lain')->first();
        $lain         = Folder::where('id_menu', $menu_lain->id)->count();

        return view('dashboard.index', compact('tender',  'proyek', 'inventaris', 'keuangan', 'lain'));
    }

     // Searching Folder
     public function searching( Request $request)
     {
    //    $menu = Menu::where('name', $menu_name)->first(); 
        //  $id_menu    = $menu->id;
         if ($request->folder) {
                 $datas = Folder::where('name', 'like', '%'.$request->folder.'%')->get();      
         }else{
             $datas = File::orderBy('name_show', 'asc');
                 $datas = $datas->where('name_show', 'like', '%'.$request->file.'%')->get();
         }
         return $datas;
       
     }
}