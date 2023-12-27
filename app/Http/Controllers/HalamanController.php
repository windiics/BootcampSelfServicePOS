<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        return view("halaman/index");
    }
    function tentang()
    {
        $data = [
            'tentang' => [
                'Tempat/Tanggal Lahir' => 'Bandung 22 September 2001',
                'Usia' => '22 Tahun',
                'Agama' => 'Islam Ahlussunnah Wal Jamaah'
            ]
        ];
        return view("halaman/tentang")->with($data);
    }
    function kontak()
    {
        $judul = 'Halaman Kontak';
        $data = [
            'judul' => 'Halaman Kontak',
            'kontak' => [
                'email' => 'windics@gmail.com',
                'instagram' => 'windics22_'
            ]
        ];
        return view("halaman/kontak")->with($data);
    }
}
