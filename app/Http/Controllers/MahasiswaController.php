<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::orderBy('nomor_induk', 'asc')->paginate(3);
        return view('mahasiswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa/create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * 
     * 
     */
    public function store(Request $request)
    {

        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'nomor_induk'=> 'required|numeric',
            'nama'=> 'required',
            'alamat'=>'required',
            'foto'=>'required|mimes:jpeg,jpg,png,gif'
        ],[
            'nomor_induk.required'=>'Nomor Induk wajib diisi',
            'nomor_induk.numeric'=>'Nomor Induk wajib diisi dalam angka',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'foto.required'=>'Silahkan masukkan foto',
            'foto.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG,JPG,PNG, dan GIF'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') .".". $foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama
        ];
        Mahasiswa::create($data);
        return redirect('mahasiswa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Mahasiswa::where('nomor_induk', $id)->first();
        return view('mahasiswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Mahasiswa::where('nomor_induk', $id)->first();
        return view('mahasiswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required'
        ],[
            'nomor_induk.numeric'=>'Nomor Induk wajib diisi dalam angka',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi'
        ]);
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
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

            $data_foto = Mahasiswa::where('nomor_induk',$id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            // $data = [
            //     'foto' => $foto_nama
            // ];

            $data['foto'] = $foto_nama;
            
        }

        Mahasiswa::where('nomor_induk', $id)->update($data);
        return redirect('/mahasiswa')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Mahasiswa::where('nomor_induk', $id)->first();
        File::delete(public_path('foto').'/'. $data->foto);

        Mahasiswa::where('nomor_induk', $id)->delete();
        return redirect('/mahasiswa')->with('success', 'Berhasil menghapus data');

    }
}
