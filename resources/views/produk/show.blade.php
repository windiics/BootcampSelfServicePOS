@extends('layouts2/aplikasii')

@section('konten')
    <div>
        <a href='/produk' class="btn btn-secondary"><< Kembali</a>
        <p>
            @if ($data->foto)
            <img style="max-width:120px; max-height:120px" src="{{ url('foto').'/'.$data->foto }}"/>
        @endif
        </p>
        <p>
            <b>Nomor Produk</b> {{ $data->id }}
        </p>
        <p>
            <b>Nama Produk</b> {{ $data->produk }}
        </p>
        <p>
            <b>Harga</b> {{ $data->harga }}
        </p>
        <p>
            <b>Stok</b> {{ $data->stok }}
        </p>
    </div>
@endsection
