@extends('layouts.app')

@section('title', '| Pembayaran')  

@section('content')
    <div class="row">
        <h1>Edit Cicilan Pertama</h1>
                
         {!! Form::model($pembayaran, ['route' => ['pembayaran.update', $pembayaran->id], 'method' => 'PUT', 'files' => TRUE])  !!}
           
            {{ Form::label('cicil1', 'Nominal : ') }}
            {{ Form::number('cicil1', null, ['class' => 'form-control']) }}

            {{ Form::label('image', 'Foto Bukti Transfer : ') }}
            {{ Form::file('image') }}

            {{ Form::submit('Submit', ['class' => 'btn btn-danger', 'style' => 'margin-top:20px; margin-bottom:50px;']) }}

        {!! Form::close() !!}
        


@endsection

