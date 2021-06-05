@extends('layouts/template')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detail Laundry</h6>
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
                            <td>{{ $laundry->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ Carbon\Carbon::parse($laundry->tanggal)->translatedFormat('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Berat Pakaian</th>
                            <td>{{ $laundry->berat }} gram
                                @if (Auth::user()->role == 3)
                                @if ($laundry->status == 'Menunggu')
                                    <a href="{{ route('laundry.edit', $laundry->id) }}" class="btn btn-success mb-3">Sesuaikan</a>
                                @endif
                                @endif</td>
                        </tr>
                        <tr>
                            <th>Tarif</th>
                            <td>Rp. {{ number_format($laundry->tarif) }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $laundry->status }}</td>
                        </tr>
                        @if ($laundry->status == 'Menunggu')
                        @if (Auth::user()->role == 3)
                        <tr>
                            <th>Verifikasi</th>
                            <td><a href="{{ route('laundry.updateStatus', $laundry->id) }}" class="btn btn-success mb-3">Ganti Status</a></td>
                        </tr>
                        @endif
                        @endif
                    </tbody>
                </table>
            <a class="btn btn-danger" href="{{ url('laundry') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection