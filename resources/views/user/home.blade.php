@extends('layouts.app')

@section('content')


	<div class="col-md-7">
	
		

			<h2>Tanggal Acara Pernikahan Anda</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Tempat</th>
						<th>Jenis Paket</th>
						<th>Tanggal Acara</th>
						<th>Pembayaran</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bookings as $booking)
					<tr>
						<td>{{ $booking->pembooking }}</td>
						<td>{{ $booking->tempats->nama }}</td>
						<td>{{ $booking->packages->jenis_paket }}</td>
						<td>{{ $booking->tgl_acara }}</td>
						<td><a href="#" class="btn btn-warning">Detail</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>

	</div>

	<div class="col-md-5">
		<div class="well well-danger">
			<h3>Jadwal Wedding</h3>
			<table class="table">
				<thead>
					<tr>
						<th>Tanggal Acara</th>
						<th>Tempat</th>
						<th>Paket</th>
					</tr>
				</thead>
				<tbody>
					@foreach($jadwals as $jadwal)
					<tr>
						<th>{{ $jadwal->tgl_acara }}</th>
						<td>{{ $jadwal->tempats->nama }}</td>
						<td>{{ $jadwal->packages->jenis_paket }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
    
@endsection
