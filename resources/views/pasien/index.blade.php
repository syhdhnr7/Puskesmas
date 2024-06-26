<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
@extends('main')
@section('content')
    <div class="container card">
        <h1>Daftar Pasien</h1>
        <br>
        @if(Auth::user()->role == 'admin')
        <a href="/pasien/create" class="btn btn-primary">+ Tambah Pasien</a>
        @endif
        <hr>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Dokter Id</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $iteration = 1 @endphp
                @foreach ($pasiens as $item)
                <tr>
                    <td>{{ $iteration++ }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>
                        @if($item['jk'] == 'l')
                            Laki-laki
                        @else
                            Perempuan
                        @endif
                    </td>
                    <td>{{ $item['tgl_lahir'] }}</td>
                    <td>{{ $item['alamat'] }}</td>
                    <td>{{ $item['telp'] }}</td>
                    <td>{{ $item['dokter_id'] }}</td>
                    <td>
                        @if(Auth::user()->role == 'admin')
                        <a href="/pasien/edit/{{ $item->id }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/pasien" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        @else
                            -
                        @endif
                    </td>
                    @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@endsection
</body>

</html>