@extends('layouts/template')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data Menu</h1>
                
                <form method="post" action="/menu" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control" id="name" value="{{ old('name') }}" placeholder="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Produk</label>
                        <input type="number" class="form-control" id="price" value="{{ old('price') }}" placeholder="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Produk</label>
                        <input type="file" class="form-control" id="photo" placeholder="photo" name="photo" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea type="text" class="form-control" id="description" value="{{ old('description') }}" placeholder="description" name="description" style="height: 150px; overflow: auto;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a class="btn btn-danger" href="{{ url('menu') }}">Kembali</a>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection