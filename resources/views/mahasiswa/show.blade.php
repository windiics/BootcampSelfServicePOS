@extends('layouts2/aplikasi')

@section('konten')
    <div>
        <a href='/mahasiswa' class="btn btn-secondary"><< Kembali</a>
        <h1>{{ $data->nama }}</h1>
        <p>
            <b>Nomor Induk</b> {{ $data->nomor_induk }}
        </p>
        <p>
            <b>Alamat</b> {{ $data->alamat }}
        </p>
    </div>
@endsection