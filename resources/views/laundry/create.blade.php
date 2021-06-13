@extends('layouts/template')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data Laundry</h1>
                <form method="post" action="{{ route('laundry.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Berat Pakaian (gram)</label>
                        <input type="tel" class="form-control" id="berat" value="{{ old('berat') }}" placeholder="Berat pakaian dalam gram" name="berat">
                        @error('berat')
                        <code>{{ $message }}</code>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a class="btn btn-danger" href="{{ url('laundry') }}">Kembali</a>
                </form>
			</div>
		</div>
	</div>
@endsection