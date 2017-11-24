@extends('admin')
	
	@section('title', 'Admin Panel | Portofolio')

	@section('content')

	

	<div class="col-md-8">
		
		<div class="row">
			<div class="col-md-8">
				<h1>Portofolio</h1>
			</div>
			<div class="col-md-4" style="margin-top:25px">
				<a href="/portofolio/create" class="btn btn-success">Tambah Portofolio</a>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Caption</th>
						<th>Images</th>
						<th>Action</th>
					</thead>
					<tbody>

						@foreach($portofolios as $portofolio)
							<tr>
								<th>{{ $portofolio->id }}</th>
								
								<td>{{ substr($portofolio->caption,0,50) }}{{ strlen($portofolio->caption) > 50 ? "..." : "" }}</td> {{-- if true or false --}}
								<td><img src="{{ asset('portofolio_images/'. $portofolio->image) }}" style="width:200px; height:100px;"></td>
								<td>
								<a href="{{ route('portofolio.edit', $portofolio->id) }}" class="btn btn-primary btn-block" style="margin-bottom:5px;">Edit</a>

								{!! Form::open(['route' => ['portofolio.destroy', $portofolio->id], 'method' => 'DELETE']) !!}

								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => "return confirm('Are you sure')"]) !!}

								{!! Form::close() !!}

							</tr>
								
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>


	@endsection

	@section('scripts')

	@endsection