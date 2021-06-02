@extends('layouts/template')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data Token Listrik</h1>
                <form method="post" action="{{ route('listrik.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nomor Token</label>
                        <input type="tel" class="form-control" id="token" value="{{ old('token') }}" placeholder="Token Listrik" name="token">
                        @error('token')
                        <code>{{ $message }}</code>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a class="btn btn-danger" href="{{ url('listrik') }}">Kembali</a>
                </form>
			</div>
		</div>
	</div>
@endsection