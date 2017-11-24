@extends('admin')

	@section('title', 'Welcome to Admin Panel | Paket Wedding')

	@section('content')

	<div class="col-md-8">

        <div class="row" style="margin-bottom:50px">
          <div class="col-md-8">
            <h1>{{ $packages->jenis_paket }}</h1>
            <p>Harga Paket : <b style="color:red">{{ $packages->harga }}</b></p>
          </div>
          <div class="col-md-4">
            <a style="margin-top:25px" href="{{ route('paket-wedding.edit', $packages->id) }}" class="btn btn-success">Edit Paket</a>
          </div>
        </div>
        <div class="row">
          <h4>Deskripsi</h4>
          <p>{!! $packages->deskripsi !!}</p>     
        </div>
  </div>

	@endsection

	@section('scripts')
		
	@endsection