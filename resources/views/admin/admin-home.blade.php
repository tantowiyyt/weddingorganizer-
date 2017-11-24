@extends('admin')

	@section('title', 'Welcome to Admin Panel')

	@section('content')
		
		<div class="col-md-8">
			<h1>Jadwal Wedding</h1>
			@if(empty($bookings))
				<h1 style="color:red">Jadwal Kosong</h1>
			@else
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Pembooking</th>
						<th>Tempat</th>
						<th>Jenis Paket</th>
						<th>Tanggal Acara</th>
						<th>Keterangan</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>
				@foreach($bookings as $booking)
					<tr>
						<th>{{ $booking->id }}</th>
						<td>{{ $booking->pembooking }}</td>
						<td>{{ $booking->tempats->nama }}</td>
						<td>{{ $booking->packages->jenis_paket }}</td>
						<td>{{ $booking->tgl_acara }}</td>
						<td style="color:red">Lunas</td>
						<th><a href="{{ route('adminbooking.show', $booking->id) }}" class="btn btn-warning">Detail</a></th>
					</tr>
				@endforeach
				</tbody>
			</table>
			@endif
		</div>
			

	@endsection

	@section('scripts')
		
	@endsection