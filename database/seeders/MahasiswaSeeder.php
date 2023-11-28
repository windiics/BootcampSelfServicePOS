<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('mahasiswa')->insert([
            'nama'=> 'Windi Centia Septiani',
            'nomor_induk' => '2000',
            'alamat'=> 'Bandung',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('mahasiswa')->insert([
            'nama'=> 'Tya',
            'nomor_induk' => '4000',
            'alamat'=> 'Garut',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('mahasiswa')->insert([
            'nama'=> 'Ani',
            'nomor_induk' => '8000',
            'alamat'=> 'Yogyakarta',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
