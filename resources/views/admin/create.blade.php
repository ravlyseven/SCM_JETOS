@extends('layouts/template')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data IPKL</h1>
                <form method="post" action="{{ route('admin.store') }}">
                    @csrf
                    <div class="form-group">
                        <select name="id" id="id" class="form-control input-sm">
                            @foreach($parapenghuni as $penghuni)
                            <option value="{{ $penghuni->id }}">{{ $penghuni->id }}. {{ $penghuni->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a class="btn btn-danger" href="{{ url('admin') }}">Kembali</a>
                </form>
			</div>
		</div>
	</div>
@endsection