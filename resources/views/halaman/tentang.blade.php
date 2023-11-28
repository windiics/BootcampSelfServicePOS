@extends('layouts2/aplikasi')

@section('konten')
        <h1>Halaman Tentang</h1>
        <p>Hi!&#128075 Saya Windi Centia Septiani&#x1F496 ini halaman tentang saya&#10024</p>
        <p>
                <ul>
                    <li>TTL   : {{ $tentang['Tempat/Tanggal Lahir'] }}</li>
                    <li>Usia  : {{ $tentang['Usia'] }}</li>
                    <li>Agama : {{ $tentang['Agama'] }}</li>
                </ul>
            </p>
@endsection
