@extends('welcome')


	@section('title', "| Paket Wedding")
		 
	 

	@section('content')
		<div class="row">

			

		<div class="row" style="margin-top:20px;">
			<div class="col-md-4">
				<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Paket Hemat</h3>
				  </div>
				  <div class="panel-body" style="text-align:center">
				    <a href="paket/1"><img src="{{ asset('img/bronze.png') }}"></a>
				  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-success">
				  <div class="panel-heading">
				    <h3 class="panel-title">Paket Silver</h3>
				  </div>
				  <div class="panel-body" style="text-align:center">
				    <a href="paket/2"><img src="{{ asset('img/silver.png') }}"></a>
				  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title">Paket Gold</h3>
				  </div>
				  <div class="panel-body" style="text-align:center">
				    <a href="paket/3"><img src="{{ asset('img/gold.png') }}"></a>
				  </div>
				</div>
			</div>

		</div><br><br><br><br><br><br><br>

		
	@endsection
