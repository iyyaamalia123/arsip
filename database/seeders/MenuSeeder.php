<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
           [ 'name'      => 'Admin',
            'url'     => '/admin'],
           [ 'name'      => 'Data Karyawan',
            'url'     => '/karyawan'],
           [ 'name'      => 'Tender',
            'url'     => '/tender'],
           [ 'name'      => 'Proyek',
            'url'     => '/proyek'],
           [ 'name'      => 'Inventaris Perusahaan',
            'url'     => '/inventaris'],
           [ 'name'      => 'Keuangan',
            'url'     => '/keuangan'],
        ]);
    }
}