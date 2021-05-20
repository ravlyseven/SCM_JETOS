@extends('layouts/template')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Edit Menu</h1>
                
                <form method="post" action="/menu/{{ $menu->id }}" enctype="multipart/form-data">
                @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control" id="name" value="{{$menu->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Produk</label>
                        <input type="number" class="form-control" id="price" value="{{$menu->price}}" name="price">
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Produk</label>
                        <input type="file" class="form-control" id="photo" placeholder="photo" name="photo" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea type="text" class="form-control" id="description" value="" name="description" style="height: 150px; overflow: auto;">{{$menu->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{ url('menu') }}">Kembali</a>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection