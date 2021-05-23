@extends('layouts.template')

@section('content')
    <div class="container-fluid">
    @if(Auth::user()->role == 1)
        <a href="listrik/create"class="btn btn-primary ml-3 mb-3">Tambah Data</a>
    @endif
        @if (Auth::user()->role == 1)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Token Listrik</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nomor Token</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listrikPenghuni as $listrik)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($listrik->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>@token($listrik->token)</td>
                                <td>{{ $listrik->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->role == 2)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Token Listrik</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Penghuni</th>
                                <th>Tanggal</th>
                                <th>Nomor Token</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listrikSecurity as $listrik)
                            <tr>
                                <td>{{ $listrik->name }}</td>
                                <td>{{ Carbon\Carbon::parse($listrik->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $listrik->token }}</td>
                                <td>{{ $listrik->status }}</td>
                                <td><a href="listrik/detail"class="btn btn-success ml-3 mb-3">Detail</a></td>
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

