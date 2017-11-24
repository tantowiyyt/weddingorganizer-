@extends('admin')

	@section('title', 'Admin Panel | Edit Web')

	@section('content')

	
	<div class="col-md-8">
		<h1>Tentang Kami</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Tentang</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($abouts as $about)
				<tr>
					<td>{{ $about->tentang }}</td>
					<td>
					{!! Html::linkRoute('admintentang.edit', 'Edit', array($about->id), array('class'=> 'btn btn-primary btn-block')) !!}
					</td>
				</tr>
			@endforeach	
			</tbody>
		</table>
	</div>


	@endsection

	@section('scripts')

	@endsection