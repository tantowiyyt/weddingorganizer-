@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>Edit Booking Paket Wedding</h1>
            {!! Form::model($bookings, ['route' => ['booking.update', $bookings->id], 'method' => 'PUT'])  !!}
            
                    <input type="hidden" name="pembooking" value="{{ Auth::user()->name }}">

                    {{ Form::label('tempat_id', 'Tempat : ') }}
                    <select class="form-control" name="tempat_id">
                        @foreach($tempats as $tempat)
                       <option value="{{ $tempat->id }}">{{ $tempat->nama }}</option>
                        @endforeach
                    </select>


                    {{ Form::label('package_id', 'Paket Pernikahan : ') }}
                    <select class="form-control" name="package_id">
                       @foreach($packages as $package)
                       <option value="{{ $package->id }}">{{ $package->jenis_paket }}</option>
                        @endforeach
                    </select>

                    {{ Form::label('tgl_acara', 'Tanggal Acara:') }}
                    {{ Form::text('tgl_acara', null, array('class' => 'form-control')) }}

                    {{ Form::submit('Edit Booking', array('class' => 'btn btn-success btn-large btn-block', 'style' => 'margin-top:20px', )) }}
                {!! Form::close() !!}

    </div>

@endsection
