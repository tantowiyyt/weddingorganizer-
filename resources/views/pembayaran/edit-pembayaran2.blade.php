@extends('layouts.app')

@section('title', '| Pembayaran')  

@section('content')
    <div class="row">
        <h1>Edit Cicilan Kedua</h1>
                
         {!! Form::model($pembayaran2, ['route' => ['pembayaran2.update', $pembayaran2->id], 'method' => 'PUT', 'files' => TRUE])  !!}
           
            {{ Form::label('cicil2', 'Nominal : ') }}
            {{ Form::number('cicil2', null, ['class' => 'form-control']) }}

            {{ Form::label('image', 'Foto Bukti Transfer : ') }}
            {{ Form::file('image') }}

            {{ Form::submit('Submit', ['class' => 'btn btn-danger', 'style' => 'margin-top:20px; margin-bottom:50px;']) }}

        {!! Form::close() !!}
        


@endsection

