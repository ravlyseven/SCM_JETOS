@extends('layouts/template')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detail IPKL</h6>
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
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama Penghuni</th>
                            <td>{{ $ipkl->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Unit</th>
                            <td>{{ $ipkl->user->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ Carbon\Carbon::parse($ipkl->tanggal)->translatedFormat('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>Rp. {{ number_format($ipkl->total) }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $ipkl->status }}</td>
                        </tr>
                        @if ($ipkl->status == 'Menunggu Verifikasi')
                        @if (Auth::user()->role == 0)
                        <tr>
                            <th>Verifikasi</th>
                            <td><a href="{{ route('admin.updateStatus', $ipkl->id) }}" class="btn btn-success mb-3">Verifikasi</a></td>
                        </tr>
                        @endif
                        @endif
                        <tr>
                            <th>Bukti Pembayaran</th>
                            <td><img class="rounded mx-4 my-4" style="width:90%" src="{{ asset('storage/'.$ipkl->photo) }}">
                                @if (Auth::user()->role == 1)
                                @if ($ipkl->status == 'Menunggu Pembayaran')
                                    <a href="{{ route('admin.edit', $ipkl->id) }}" class="btn btn-success mb-3">Upload Bukti</a>
                                @endif
                                @endif</td>
                        </tr>
                    </tbody>
                </table>
            <a class="btn btn-danger" href="{{ url('admin') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection