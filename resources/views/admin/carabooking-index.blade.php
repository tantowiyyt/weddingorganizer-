@extends('admin')

	@section('title', 'Admin Panel | Edit Web')

	@section('content')

	
	<div class="col-md-8">
		<h1>Cara Booking</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Cara Booking</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($cara as $car)
				<tr>
					<td>{!! $car->cara !!}</td>
					<td>
					{!! Html::linkRoute('cara.edit', 'Edit', array($car->id), array('class'=> 'btn btn-primary btn-block')) !!}
					</td>
				</tr>
			@endforeach	
			</tbody>
		</table>
	</div>


	@endsection

	@section('scripts')

	@endsection