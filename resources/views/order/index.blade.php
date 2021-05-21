@extends('layouts/template')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mx-4">
    <div class="card-header py-3 bg-gradient-primary">
        <h6 class="m-0 font-weight-bold text-light">Pesanan Makanan dan Minuman</h6>
    </div>
            
    <div class="card-body">
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
                        <th>Aksi</th>
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
                            <form action="{{ url('order') }}/{{ $orderdetail->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="5" align="right">Total Harga</td>
                        <td align="left">Rp. {{ number_format($order->total_price) }}</td>
                        <td>
                            <a href="{{ url('checkout') }}" class="btn btn-success">
                                <i class="fa fa-shopping-cart"></i>Checkout
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endif
            </table>    
        </div>
    </div>
    
</div>

@endsection