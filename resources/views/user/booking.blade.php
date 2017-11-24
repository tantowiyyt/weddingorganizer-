@extends('layouts.app')

@section('title', '| Booking Paket Wedding')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <h1>Booking Paket Wedding</h1>
            {!! Form::open(array('action' => 'BookingController@store', 'method' => 'POST'))  !!}
            
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

                    <div class="col-md-3" style="margin-bottom:50px">
                    
                    <label class='control-label input-sm' for='tgl_acara'>Tanggal Acara:</label>
          <div class="input-group date form_date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
              <input class="form-control input-sm" type="text" name="tgl_acara" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>

                    </div>
                    {{ Form::submit('Book', array('class' => 'btn btn-success btn-large btn-block', 'style' => 'margin-top:20px', )) }}
                {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">
   $('.form_date').datetimepicker({
          language:  'id',
          weekStart: 1,
          todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
      });
  </script>
@endsection
