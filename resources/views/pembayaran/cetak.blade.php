<!DOCTYPE html>
<html>
<head>
	<title>Cetak Nota ID Booking : {{ $booking->id }}</title>
	<link rel="stylesheet" type="text/css" href="{{  asset('css/app.css') }}">
	<style type="text/css">
		.nota{
			background-color: #F4f4f4;
			border: solid;
		}
		@media print{
			.print{
				display: none;
			}
		}
	</style>
</head>
<body>
	
	<div class="container">
		<div class="row nota" id="print">
			<div class="col-md-8 col-md-offset-2">
			
			<h1 style="margin-top:100px">Nota Wedding Organizer</h1>
			<table>
				<tr>
					<td>ID Booking</td>
					<td>&nbsp&nbsp:&nbsp&nbsp</td>
					<td>{{ $booking->id }}</td>
				</tr>
				<tr>
					<td>Pembooking</td>
					<td>&nbsp&nbsp:&nbsp&nbsp</td>
					<td>{{ $booking->pembooking }}</td>
				</tr>
				<tr>
					<td>Tempat</td>
					<td>&nbsp&nbsp:&nbsp&nbsp</td>
					<td>{{ $booking->tempats->nama }}</td>
				</tr>
				<tr>
					<td>Paket Pernikahan</td>
					<td>&nbsp&nbsp:&nbsp&nbsp</td>
					<td>{{ $booking->packages->jenis_paket }}</td>
				</tr>
				<tr>
					<td>Tanggal Acara</td>
					<td>&nbsp&nbsp:&nbsp&nbsp</td>
					<td>{{ $booking->tgl_acara }}</td>
				</tr>
			</table>

			<h3>Rincian</h3>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Tanggal Pembayaran</th>
						<th>Nominal</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Cicilan 1</th>
						<td>{{ date('j M Y', strtotime($booking->pembayarans->updated_at)) }}</td>
						<td>{{ $booking->pembayarans->cicil1 }}</td>
					</tr>
					<tr>
						<th>Cicilan 2</th>
						<td>{{ date('j M Y', strtotime($booking->pembayarans2->updated_at)) }}</td>
						<td>{{ $booking->pembayarans2->cicil2 }}</td>
					</tr>
					<tr>
						<td></td>
						<th>Total</th>
						<th>{{ $booking->pembayarans->cicil1 + $booking->pembayarans2->cicil2 }}</th>
					</tr>
					<tr>
						<td></td>
						<th>Keterangan</th>
						<th><p style="color:red">Lunas</p></th>
					</tr>
				</tbody>
			</table>

			</div>		

			
				<div class="col-md-3 col-md-offset-7" style="margin-bottom:100px">
					<?php
						$tanggal = date('j M Y');
						$new = date('j M Y', strtotime($tanggal));
					?>
					<p>Indramayu, <?php echo $new; ?></p>
					<br>
					<br>
					<br>
					<p><strong>Wedding Organizer</strong></p>
				</div>
			
			

		</div>
			<center style="margin-top:40px; margin-bottom:40px">
			<form>
				<a href="javascript:printDiv('print');">
					<button type="button" class="btn btn-danger" onclick="window.print();">Cetak</Button>
				</a>
			</form class="print">	
			</center>
	</div>

</body>
</html>