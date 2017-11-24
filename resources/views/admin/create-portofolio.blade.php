@extends('admin')

	@section('title', 'Admin Panel | Tambah Portofolio')

	@section('content')

	

	<div class="col-md-8">
		<h1>Tambah Portofolio</h1>
		{!! Form::open(array('action' => 'AdminPortofolio@store', 'files' => true)) !!}
			{{ Form::label('caption', 'Caption:') }}
			{{ Form::text('caption', null, array('class' => 'form-control', 'required' => '', 'maxlenght' => '255')) }}

			{{ Form::label('image', 'Image :') }}
			{{ Form::file('image') }}

			{{ Form::submit('Tambah Portofolio', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px', )) }}
		{!! Form::close() !!}
	</div>


	@endsection

	@section('scripts')

	@endsection