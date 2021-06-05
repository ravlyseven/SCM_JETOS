@extends('layouts.template')

@section('content')
    <div class="container-fluid">
    @if(Auth::user()->role == 1)
        <a href="laundry/create"class="btn btn-primary ml-3 mb-3">Tambah Data</a>
    @endif
        @if (Auth::user()->role == 1)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Laundry</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Berat Pakaian</th>
                                <th>Tarif</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laundrypenghuni as $laundry)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($laundry->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $laundry->berat }} gram</td>
                                <td>Rp. {{ number_format($laundry->tarif) }}</td>
                                <td>{{ $laundry->status }}</td>
                                <td><a href="laundry/detail/{{ $laundry->id }}" class="btn btn-success ml-3 mb-3">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->role == 3)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Laundry</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Penghuni</th>
                                <th>Tanggal</th>
                                <th>Berat Pakaian</th>
                                <th>Tarif</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laundryadmin as $laundry)
                            <tr>
                                <td>{{ $laundry->user->name }}</td>
                                <td>{{ Carbon\Carbon::parse($laundry->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $laundry->berat }} gram</td>
                                <td>Rp. {{ number_format($laundry->tarif) }}</td>
                                <td>{{ $laundry->status }}</td>
                                <td><a href="laundry/detail/{{ $laundry->id }}"class="btn btn-success ml-3 mb-3">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection

