@extends('admin')

	@section('title', 'Welcome to Admin Panel | Paket Wedding')

	@section('content')

	<div class="col-md-8">
       <div class="col-md-8">
            <h1>Paket Wedding</h1>          
       </div> 
	   <div class="col-md-4" style="margin-top:25px">
           <a href="{{ route('paket-wedding.create') }}" class="btn btn-primary">Tambah Paket Wedding</a>
       </div>
       <div style="margin-top:40px">
       <table class="table">
           <thead>
               <tr>
                   <th>#</th>
                   <th>Jenis Paket</th>
                   <th>Deskripsi</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($packages as $package) 
               <tr>
                   <th>{{ $package->id }}</th>
                   <td>{{ $package->jenis_paket }}</td>
                   <td>{!!  substr($package->deskripsi,0,25) !!}{!! strlen($package->deskripsi) > 25 ? "..." : ""  !!}</td>
                   <th>
                        <a href="{{ route('paket-wedding.show', $package->id) }}" class="btn btn-success">Lihat</a>
                        {!! Form::open(['route' => ['paket-wedding.destroy', $package->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure')"]) !!}

                        {!! Form::close() !!}
                   </th>
               </tr>
               @endforeach
           </tbody>
       </table>
       </div>
    </div>

	@endsection

	@section('scripts')
		
	@endsection