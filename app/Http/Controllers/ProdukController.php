<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $nama_produk = "Khimar WindiCS";
        $jenis = "Pashmina";
        $warna = "Pink Peach";

        $data_array = array(
            "nama_produk" => array(
                "Khimar WindiCS", "Jilbab Windi CS", "Dress WindiCS"
            ),
        );

        return view('produk', compact(
            'nama_produk', 
            'jenis', 
            'warna', 
            'data_array'
        ));
    }
}
