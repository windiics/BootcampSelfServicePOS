@extends('layouts2/aplikasi')

@section('konten')
        <h1>{{ $judul }}</h1>
        <p>Hi!&#128075 Saya Windi Centia Septiani&#x1F496 ini adalah halaman kontak saya&#9742</p>
        <p>
            <ul>
                <li>&#128231Email : {{ $kontak['email'] }}</li>
                <li>&#128248Instagram : {{ $kontak['instagram'] }}</li>
            </ul>
        </p>
@endsection