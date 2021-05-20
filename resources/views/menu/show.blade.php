@extends('layouts/template')

@section('content')
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-dark">
                <img class="rounded mx-4 my-4" style="width:90%" src="{{ asset('storage/'.$menu->photo) }}">
              </div>

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 font-weight-bold text-gray-900 mb-2">{{$menu->name}}</h1>
                    <h1 class="h4 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($menu->price) }}</h1>
                    <hr>
                    <h1 class="h4 mb-0 font-weight-bold text-gray-800">Deskripsi Produk</h1>
                    <p class="mb-4">{{$menu->description}}</p>
                    <hr>
                    <p>Masukkan Jumlah Pesanan :</p>
                    <form action="{{ url('orders') }}/{{ $menu->id }}" method="post" class="d-inline">
                      @csrf
                      <input type="number" name="total_order" class="form-control mb-3">
                      <button type="submit" class="btn btn-warning">
                      <i class="fa fa-shopping-cart"></i>Tambah Ke Keranjang</button>
                    </form>

                    <a class="btn btn-primary" href="{{ url('home') }}">Kembali</a>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>
@endsection