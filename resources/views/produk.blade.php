<head>
    <link rel="stylesheet" href="{{ 'css/app.css' }}">
</head>

    <h1>Produk &#x1F49F</h1>
    <hr>
    <table border="0">
        <tr>
            <td>Nama Produk :</td>
            <td>{{ $nama_produk }}</td>
        </tr> 
        <tr>
            <td>Jenis Produk :</td>
            <td>{{ $jenis }}</td>
        </tr>  
        <tr>
            <td>Warna Produk :</td>
            <td>{{ $warna }}</td>
        </tr>
    </table>

    <h1>Contoh Pengulangan&#x267B</h1>
    <table>
        @foreach ($data_array['nama_produk'] as $data)
                <tr>
                    <td>Nama Produk:</td>
                    <td>{{ $data }}</td>
                </tr>
        @endforeach
    </table>