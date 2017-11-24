@extends('welcome')


	@section('title', "| Homepage")
		 
	 

	@section('content')
		<div class="row">

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			    <li data-target="#myCarousel" data-slide-to="3"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="{{ asset('img/1.jpg') }}" alt="Chania">
			    </div>

			    <div class="item">
			      <img src="{{ asset('img/1.jpg') }}" alt="Chania">
			    </div>

			    <div class="item">
			      <img src="{{ asset('img/1.jpg') }}" alt="Flower">
			    </div>

			    <div class="item">
			      <img src="{{ asset('img/1.jpg') }}" alt="Flower">
			    </div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		
		</div> {{-- end of slider --}}

		<div class="row" style="margin-top:20px;">
			<div class="col-md-4">
				<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Paket Hemat</h3>
				  </div>
				  <div class="panel-body" style="text-align:center">
				    <a href="/paket/1"><img src="{{ asset('img/bronze.png') }}"></a>
				  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-success">
				  <div class="panel-heading">
				    <h3 class="panel-title">Paket Silver</h3>
				  </div>
				  <div class="panel-body" style="text-align:center">
				    <a href="/paket/2"><img src="{{ asset('img/silver.png') }}"></a>
				  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title">Paket Gold</h3>
				  </div>
				  <div class="panel-body" style="text-align:center">
				    <a href="/paket/3"><img src="{{ asset('img/gold.png') }}"></a>
				  </div>
				</div>
			</div>

		</div>

		<div class="row">
			<center>
				<h2>Portofolio</h2>
			</center>
			<div class="row">
			  @foreach($portofolios as $portofolio)
			  <div class="col-md-3">
			    <a href="#" class="thumbnail">
			      <img src="{{ asset('portofolio_images/'. $portofolio->image) }}" alt="...">
			    </a>
			  </div>
			  @endforeach  
			  
			</div>
			<div class="row">
				{{ $portofolios->links() }}
			</div>
		</div>

	@endsection
