@extends('layouts/template')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mx-4">
    <div class="card-header py-3 bg-gradient-primary">
        <h6 class="m-0 font-weight-bold text-light">Pesanan Makanan dan Minuman (Sedang Disiapkan)</h6>
    </div>

       
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        @if(Auth::user()->role == 4)
                        <th>Nama Penghuni</th>
                        @endif
                        <th>Jumlah Pesanan</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($orders as $order)
                    @if($order != null)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $order->updated_at->format('d/m/y h:i') }}</td>
                        @if(Auth::user()->role == 4)
                        <td>{{ $order->user->name }}</td>
                        @endif
                        <td>{{ $order->orderdetail->count() }}</td>
                        <td align="left">Rp. {{ number_format($order->total_price) }}</td>
                        <td>
                            <a href="{{ url('order/show/'.$order->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-folder-open"> Open</i>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach

                    <tr>
                        <td colspan="5">
                            <a href="{{ url('menu') }}" class="btn btn-warning">
                                <i class="fa fa-shopping-cart"></i> Kembali
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </div>
    
</div>

@endsection