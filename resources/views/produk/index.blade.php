@extends('layouts2/aplikasii')

@section('konten')
    <a href="/produk/create" class="btn btn-primary">+Tambah Data Produk</a>
    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nomor Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->foto)
                            <img style="max-width:80px; max-height:80px" src="{{ url('foto').'/'.$item->foto }}"/>
                        @endif
                    </td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->produk }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <a class='btn btn-secondary btn-sm' href='{{ url('/produk/'.$item->id) }}'>Detail</a>
                        <a class='btn btn-warning btn-sm' href='{{ url('/produk/'.$item->id.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ '/produk/' .$item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
