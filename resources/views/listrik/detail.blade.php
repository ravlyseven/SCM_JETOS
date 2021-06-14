@extends('layouts/template')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detail Token Listrik</h6>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('success') }}
                </div>
            </div>
            @endif
            @foreach ($detailListrik as $listrik)
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama Penghuni</th>
                            <td>{{ $listrik->name }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Unit</th>
                            <td>{{ $listrik->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ Carbon\Carbon::parse($listrik->tanggal)->translatedFormat('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Nomer Token Listrik</th>
                            <td>@token($listrik->token)</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $listrik->status }}</td>
                        </tr>
                        @if ($listrik->status == 'Menunggu')
                        <tr>
                            <th>Verifikasi</th>
                            <td><a href="{{ route('listrik.update', $listrik->id) }}"class="btn btn-success mb-3">Ganti Status</a></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            @endforeach
            <a class="btn btn-danger" href="{{ url('listrik') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection