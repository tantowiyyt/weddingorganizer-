@extends('admin')

	@section('title', 'Welcome to Admin Panel')

	@section('content')

	<div class="col-md-8">
		
		
    <div class="row">
        <h1>Data Pembookingan</h1>
            <table class="table" style="margin-top:20px">
                <thead>
                    <tr>
                        <th>Pembooking</th>
                        <th>Tempat</th>
                        <th>Paket Pernikahan</th>
                        <th>Tanggal Acara</th>
                        <th>Status Pembookingan</th>
                        <th>Tanggal Pembookingan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->pembooking }}</td>
                        <td>{{ $booking->tempats->nama }}</td>
                        <td>{{ $booking->packages->jenis_paket }}</td>
                        <td>{{ $booking->tgl_acara }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ date('j M Y h:ia', strtotime($booking->created_at)) }}</td>
                        
                        @if($booking->status == 'Pending')

                        <td>{!! Form::open(['route' => ['adminbooking.update', $booking->id], 'method' => 'PUT']) !!}
                            
                            {!! Form::submit('Konfirmasi', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}</td>


                        @else

                        <td><a href="{{ route('adminbooking.show', $booking->id) }}" class="btn btn-warning">Detail Pembayaran</a></td>                    
                            
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

		
	</div>
	

	@endsection

	@section('scripts')
		
	@endsection