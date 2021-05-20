@extends('layouts.template')

@section('content')
    <div class="container-fluid">
    @if(\Auth::user()->role == 0)
    <a href="menu/create"class="btn btn-primary ml-3 mb-3">Tambah Data</a>
    @endif
        <div class="row">
            <!-- Tampilan Menu -->
            @foreach($menus as $menu)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <img class="img-thumbnail" src="{{ asset('storage/'.$menu->photo) }}">
                            </div>
                            <div class="col mr-2">
                                <a href="menu/{{ $menu->id }}">
                                <div class="h5 mb-1 text-s font-weight-bold text-primary">{{$menu->name}}</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800" align="left">Rp. {{ number_format($menu->price) }}</div>
                                </a>

                                @if(\Auth::user()->role == 0)
                                <a class="btn btn-primary" href="menu/{{ $menu->id }}/edit" class="card-link">Ubah</a>
                                <form action="menu/{{ $menu->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

