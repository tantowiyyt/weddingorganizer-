@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>Status Pembookingan</h1>
            <table class="table" style="margin-top:20px">
                <thead>
                    <tr>
                        <th>Pembooking</th>
                        <th>Tempat</th>
                        <th>Paket Pernikahan</th>
                        <th>Tanggal Acara</th>
                        <th>Status Pembookingan</th>
                        <th>Tanggal Pembookingan</th>
                        @foreach($bookings as $booking)
                        @if($booking->status == 'Pending')
                        <th>Aksi</th>
                        @else
                        <th>Cicilan 1</th>
                        <th>Cicilan 2</th>
                        <th width="100%">Stat. Pembayaran</th>
                        @endif
                        @endforeach
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

                        <td><a class="btn btn-primary" href="{{ route('booking.edit', $booking->id) }}">Edit</a></td>
                        <td>{!! Form::open(['route' => ['booking.destroy', $booking->id], 'method' => 'DELETE']) !!}
                            
                            {!! Form::submit('Batalkan', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Apakah anda yakin ingin membatalkan ?")']) !!}

                        {!! Form::close() !!}</td>


                        @else

                        <td><a href="{{ route('pembayaran.index', $booking->id) }}" class="btn btn-info">Detail</a></td>
                        <td><a href="{{ route('pembayaran2.index', $booking->id) }}" class="btn btn-info">Detail</a></td>
                        <td>
                            @if($booking->konf_pembayaran  === 'Pembayaran Terkonfirmasi')
                                {{ $booking->konf_pembayaran }}
                            @else
                                Belum dikonfirmasi  
                            @endif
                        </td>
                        @if($booking->konf_pembayaran  === 'Pembayaran Terkonfirmasi')
                                <td>
                                    <a href="{{ route('pembayaran.cetak', $booking->id) }}" class="btn btn-success" target="_blank">Cetak Nota</a>
                                </td>
                            @else
                                 
                            @endif
                        
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

@endsection
