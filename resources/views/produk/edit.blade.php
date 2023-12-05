@extends('layouts2/aplikasii')

@section('konten')
<head>
  <link rel="stylesheet" href="{{ 'css/app.css' }}">
</head>

<a href='/produk' class="btn btn-secondary"><< Kembali</a>

<form method="POST" action="{{'/produk/' .$data->id}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
      <h1>Nomor Produk: {{ $data->id }}</h1>
    </div>
    <div class="mb-3">
        <label for="produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name='produk' id="produk" value=" {{ $data->produk }} ">
      </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga Produk</label>
        <input type="text" class="form-control" name='harga' id="harga" value=" {{ $data->harga }} ">
      </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok Produk</label>
        <input type="text" class="form-control" name='stok' id="stok" value=" {{ $data->stok }} ">
      </div>

      @if ($data->foto)
          <div class="mb-3">
            <img style="max-width:80px;max-height:80px" src="{{ url('foto').'/'.$data->foto }}"/>
          </div>
      @endif
      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">UPDATE</button>
</form>

@endsection
