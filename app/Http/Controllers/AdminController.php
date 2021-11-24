<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all();
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin              = New User();
        $admin->name        = $request->name;
        $admin->password    = Hash::make($request->password);
        $admin->email       = $request->email;
        $admin->level       = $request->level;
        if ($request->status == 'on' ) {
            $admin->status  = true;
        } else {
            $admin->status  = false;
        }
        $admin->save();       

        return redirect(route('admin'))->with('success', 'Berhasil Membuat Admin');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin              = User::find($id);
        $admin->name        = $request->name;
        $admin->email       = $request->email;
        $admin->level       = $request->level;
        if ($request->status == 'on' ) {
            $admin->status  = true;
        } else {
            $admin->status  = false;
        }
        if ( $admin->update()) {
            return redirect(route('admin'))->with('success', 'Berhasil Merubah Data Admin');;
        }else{
            return redirect(route('admin'))->with('error', 'Gagal Merubah Data Admin');;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
     {
         $data = User::find($id);
         if ( $data->delete()) {
            return redirect(route('admin'))->with('success', 'Berhasil Menghapus Data Admin');;
         } else {
            return redirect(route('admin'))->with('error', 'Gagal Menghapus Data Admin');;
         }
         
        
     }
}