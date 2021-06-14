@extends('layouts/template')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Update Data IPKL</h1>
                <form method="post" action="{{ route('admin.update', $ipkl->id) }}" enctype="multipart/form-data">
                
                    @csrf
                    <div class="form-group">
                        <label for="photo">Foto Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="photo" placeholder="photo" name="photo" style="height:45px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <a class="btn btn-danger" href="{{ url('admin') }}">Kembali</a>
                </form>
			</div>
		</div>
	</div>
@endsection