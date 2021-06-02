@extends('layouts/template')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mx-4">
    <div class="card-header py-3 bg-gradient-primary">
        <h6 class="m-0 font-weight-bold text-light">Pesanan Makanan dan Minuman</h6>
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
        
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-light">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @if($order != null)
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($orderdetails as $orderdetail)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <a class="text-dark" href="menu/{{ $orderdetail->menu->id }}">
                                <img width="100px;" src="{{ asset('storage/'.$orderdetail->menu->photo) }}">
                            </a>
                        </td>
                        <td><a class="text-dark" href="menu/{{ $orderdetail->menu->id }}">{{ $orderdetail->menu->name }}</a></td>
                        <td>{{ $orderdetail->quantity }}</td>
                        <td align="left">Rp. {{ number_format($orderdetail->menu->price) }}</td>
                        <td align="left">Rp. {{ number_format($orderdetail->total_price) }}</td>
                        <td>
                            @if($order->status == 1)
                                Sedang disiapkan
                            @else
                                Selesai
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="5" align="right">Total Harga</td>
                        <td align="left">Rp. {{ number_format($order->total_price) }}</td>
                        <td>
                            <a href="{{ url('menu') }}" class="btn btn-warning">
                                <i class="fa fa-shopping-cart"></i> Kembali
                            </a>
                            @if(Auth::user()->role == 4)
                            <a href="{{ url('order/payment/'.$order->id) }}" class="btn btn-primary">
                                <i class="fa"> Ubah Status</i>
                            </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
                @endif
            </table>

            @if(Auth::user()->role == 4)
            <div>Nama Pembeli : {{$order->user->name}}</div>   
            @endif

        </div>
    </div>
    
</div>

@endsection