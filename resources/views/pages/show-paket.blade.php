@extends('welcome')


	@section('title', "| Paket Wedding")
		 
	 

	@section('content')
		<div class="row">

			<h3>{{ $paket->jenis_paket }}</h3>
			<h5 style="color:red">{{ $paket->harga }}</h5>
			{!! $paket->deskripsi !!}
		</div>
	@endsection
