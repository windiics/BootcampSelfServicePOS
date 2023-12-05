@extends('layouts2/aplikasii')

@section('konten')

<form method="POST" action="/produk" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">Nomor Produk</label>
      <input type="text" class="form-control" name='id' id="id" value=" {{ Session::get('id') }} ">
    </div>
    <div class="mb-3">
        <label for="produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name='produk' id="produk" value=" {{ Session::get('produk') }} ">
      </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga Produk</label>
        <input type="text" class="form-control" name='harga' id="harga" value=" {{ Session::get('harga') }} ">
      </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok Produk</label>
        <input type="text" class="form-control" name='stok' id="stok" value=" {{ Session::get('stok') }} ">
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

@endsection
