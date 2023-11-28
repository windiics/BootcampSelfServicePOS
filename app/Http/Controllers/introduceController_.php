<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class introduceController extends Controller
{
    //
    function index()
    {
        // $data = Mahasiswa::all();
            $data = Mahasiswa::orderBy('nomor_induk', 'desc')->paginate(2);
        return view('mahasiswa/index')->with('data', $data);

    }
    function detail($id)
    {
        // return "<h2>Saya Mahasiswa dari introduceController dengan ID $id</h2>";
        $data = Mahasiswa::where('nomor_induk', $id)->first();
        return view('mahasiswa/show')->with('data', $data);
    }

}
