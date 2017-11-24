@extends('admin')

	@section('title', 'Admin Panel | Edit Portofolio')

	@section('content')

	
	<div class="col-md-8">
		<h1>Edit Portofolio</h1>
		{!! Form::model($portofolios, ['route' => ['portofolio.update', $portofolios->id], 'files' => true, 'method' => 'PUT']) !!}
			{{ Form::label('caption', 'Caption:') }}
			{{ Form::text('caption', null, array('class' => 'form-control')) }}

			{{ Form::label('image', 'Image :') }}
			{{ Form::file('image') }}

			{{ Form::submit('Edit Portofolio', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px', )) }}
		{!! Form::close() !!}
	</div>


	@endsection

	@section('scripts')

	@endsection