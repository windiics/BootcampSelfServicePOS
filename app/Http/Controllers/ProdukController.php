<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::orderBy('id', 'asc')->paginate(3);
        return view('produk/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk/create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * 
     * 
     */
    public function store(Request $request)
    {

        Session::flash('produk', $request->produk);
        Session::flash('harga', $request->harga);
        Session::flash('stok', $request->stok);

        $request->validate([
            'produk'=> 'required',
            'harga'=> 'required|numeric',
            'stok'=> 'required|numeric',
            'foto'=>'required|mimes:jpeg,jpg,png,gif'
        ],[
            'produk.required'=>'Nama Produk wajib diisi',
            'harga.required'=>'Harga produk wajib diisi',
            'harga.numeric'=>'Harga produk wajib diisi dalam angka',
            'stok.required'=>'Stok produk wajib diisi',
            'stok.numeric'=>'Stok produk wajib diisi dalam angka',
            'foto.required'=>'Silahkan masukkan foto',
            'foto.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG,JPG,PNG, dan GIF'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') .".". $foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        $data = [
            'id' => $request->input('id'),
            'produk' => $request->input('produk'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'foto' => $foto_nama
        ];
        Produk::create($data);
        return redirect('produk')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Produk::where('id', $id)->first();
        return view('produk/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Produk::where('id', $id)->first();
        return view('produk/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'produk'=>'required',
            'harga'=>'required',
            'stok'=>'required'
        ],[
            'id.numeric'=>'Nomor produk wajib diisi dalam angka',
            'produk.required'=>'Nama produk wajib diisi',
            'harga.required'=>'Harga produk wajib diisi',
            'stok.required'=>'Stok produk wajib diisi'
        ]);
        $data = [
            'produk' => $request->input('produk'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ];

        if($request->hasFile('foto')){
            $request->validate([
                'foto'=>'mimes:jpeg,jpg,png,gif'
            ],[
                'foto.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG,JPG,PNG, dan GIF'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') .".". $foto_ekstensi;
            $foto_file->move(public_path('foto'),$foto_nama);
            //sudah terupload ke directori

            $data_foto = Produk::where('id',$id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            // $data = [
            //     'foto' => $foto_nama
            // ];

            $data['foto'] = $foto_nama;
            
        }

        Produk::where('id', $id)->update($data);
        return redirect('/produk')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Produk::where('id', $id)->first();
        File::delete(public_path('foto').'/'. $data->foto);

        Produk::where('id', $id)->delete();
        return redirect('/produk')->with('success', 'Berhasil menghapus data');

    }
}
