@extends('welcome')


	@section('title', "| Tentang Kami")
		 
	 

	@section('content')
		<div class="row">
			<h1>Tentang Kami</h1>
			@foreach($tentangs as $tentang)
				<p>{{ $tentang->tentang }}</p>
			@endforeach
		</div>	
	@endsection
