@extends('admin')

@section('title', '| Detail Pembayaran')

@section('content')
	<div class="col-md-9">
		<h1>Detail Pembayaran</h1>
		
		<table>
			<tr>
				<th>ID Pembookingan</th>
				<td>&nbsp&nbsp:&nbsp&nbsp</td>
				<td>{{ $bookings->id }}</td>
			</tr>
			<tr>
				<th>Nama Pembooking</th>
				<td>&nbsp&nbsp:&nbsp&nbsp</td>
				<td>{{ $bookings->pembooking }}</td>
			</tr>
			<tr>
				<th>Tempat</th>
				<td>&nbsp&nbsp:&nbsp&nbsp</td>
				<td>{{ $bookings->tempats->nama }}</td>
			</tr>
			<tr>
				<th>Paket Wedding</th>
				<td>&nbsp&nbsp:&nbsp&nbsp</td>
				<td>{{ $bookings->packages->jenis_paket }}</td>
			</tr>
			<tr>
				<th>Tanggal Acara</th>
				<td>&nbsp&nbsp:&nbsp&nbsp</td>
				<td>{{ $bookings->tgl_acara }}</td>
			</tr>
			<tr>
				<th>Status</th>
				<td>&nbsp&nbsp:&nbsp&nbsp</td>
				<td>{{ $bookings->status }}</td>
			</tr>
			<tr>
				<th>Tanggal Booking</th>
				<td>&nbsp&nbsp:&nbsp&nbsp</td>
				<td>{{ date('j M Y', strtotime($bookings->updated_at)) }}</td>
			</tr>
		</table>
		
		<div class="col-md-8" style="margin-top:20px">
		@if(empty($bookings->pembayarans->cicil1))
						
			<h1 style="color:red">USER BELUM MELAKUKAN PEMBAYARAN</h1>

		@else
			<table class="table">
				<thead>
					<tr>
						<th>Cicilan</th>	
						<th>Nominal</th>
						<th>Bukti Transfer</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
						
					<tr>	
						<th>Cicilan 1</th>
						<td>{{ $bookings->pembayarans->cicil1 }}</td>
						<td><img src="{{ asset('pembayaran/'. $bookings->pembayarans->bukti1) }}"></td>
						<td>{{ date('j M Y', strtotime($bookings->pembayarans->tgl1)) }}</td>
					</tr>
					@if(empty($bookings->pembayarans2->cicil2))

					@else
					<tr>	
						<th>Cicilan 2</th>
						<td>{{ $bookings->pembayarans2->cicil2 }}</td>
						<td><img src="{{ asset('pembayaran/'. $bookings->pembayarans2->bukti2) }}"></td>
						<td>{{ date('j M Y', strtotime($bookings->pembayarans->tgl2)) }}</td>
					</tr>
					<tr>
						<th>Harga Paket</th>
						<th>{{ $bookings->packages->harga }}</th>
						<td>Keterangan</td>
						<th>

							@if($bookings->pembayarans->cicil1 + $bookings->pembayarans2->cicil2 == $bookings->packages->harga)
							<p style="color:blue">Lunas</p>
							@elseif($bookings->pembayarans->cicil1 + $bookings->pembayarans2->cicil2 < $bookings->packages->harga)
							<p style="color:red">Belum Lunas</p>
									
							@endif
						</th>
					</tr>

					@endif
				</tbody>
			</table>
		@if($bookings->pembayarans->cicil1 + $bookings->pembayarans2->cicil2 == $bookings->packages->harga)
			@if($bookings->konf_pembayaran == NUll)
			<div style="text-align:right; margin-top:20px; margin-bottom:40px">
				{!! Form::model($bookings, ['route' => ['konfpembayaran.pembayaran', $bookings->id], 'method' => 'PUT']) !!}
                            
                            {!! Form::submit('Konfirmasi Pembayaran', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}
			</div>
			@elseif($bookings->konf_pembayaran == 'Pembayaran Terkonfirmasi')
			@endif
			
		@endif
		@endif

		</div>
	</div>
@endsection

