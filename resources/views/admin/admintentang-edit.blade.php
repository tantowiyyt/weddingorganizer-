@extends('admin')

	@section('title', 'Admin Panel | Edit Tentang')

	@section('content')

	
	<div class="col-md-8">


		<h1>Edit Tentang Kami</h1>
		{!! Form::model($abouts, ['route' => ['admintentang.update', $abouts->id],  'method' => 'PUT']) !!}
			{{ Form::label('tentang', 'Tentang :') }}
			{{ Form::textarea('tentang', null, array('class' => 'form-control')) }}

			{{ Form::submit('Edit Tentang Kami', array('class' => 'btn btn-info btn-block', 'style' => 'margin-top:20px', )) }}
		{!! Form::close() !!}
	</div>


	@endsection

	@section('scripts')

	@endsection