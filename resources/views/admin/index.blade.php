@extends('layouts.template')

@section('content')
    <div class="container-fluid">
    @if(Auth::user()->role == 0)
        <a href="admin/create"class="btn btn-primary ml-3 mb-3">Tambah Data</a>
    @endif
        @if (Auth::user()->role == 1)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data IPKL</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Total Tagihan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ipklpenghuni as $ipkl)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($ipkl->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>Rp. {{ number_format($ipkl->total) }}</td>
                                <td>{{ $ipkl->status }}</td>
                                <td><a href="admin/detail/{{ $ipkl->id }}" class="btn btn-success ml-3 mb-3">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->role == 0)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data IPKL</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Penghuni</th>
                                <th>Tanggal</th>
                                <th>Total tagihan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ipkls as $ipkl)
                            <tr>
                                <td>{{ $ipkl->user->name }}</td>
                                <td>{{ Carbon\Carbon::parse($ipkl->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>Rp. {{ number_format($ipkl->total) }}</td>
                                <td>{{ $ipkl->status }}</td>
                                <td><a href="admin/detail/{{ $ipkl->id }}"class="btn btn-success ml-3 mb-3">Detail</a></td>
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

