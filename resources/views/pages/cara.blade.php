@extends('welcome')


	@section('title', "| Cara Booking")
		 
	 

	@section('content')
		<div class="row">
			
			@foreach($cara as $car)
				<p>{!! $car->cara !!}</p>
			@endforeach
		</div>	
	@endsection
