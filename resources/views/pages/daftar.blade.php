@extends('welcome')

	@section('title', '| Daftar Member')

	@section('content')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Daftar Member</h1>
				<hr>
				<form>
					<label for="Name">Nama Lengkap : </label>
					<input type="text" name="text" id="text" class="form-control">

					<label for="ktp" style="margin-top:10;">No.Ktp : </label>
					<input type="ktp" name="ktp" id="ktp" class="form-control">

					<label for="alamat" style="margin-top:10;">Alamat : </label>
					<textarea class="form-control"></textarea>

					<label for="email">Email : </label>
					<input type="email" name="email" class="form-control">

					<label for="hp">No. Hp : </label>
					<input type="text" name="hp" class="form-control">

					<label for="password">Password : </label>
					<input type="password" name="password" class="form-control">


					<label for="repassword">Ulangi Password : </label>
					<input type="repassword" name="repassword" class="form-control">

					<section style="margin-top:10px;">
						<input type="submit" value="Daftar" class="btn btn-primary">
					</section>

				</form>


			</div>	
		</div>
	@endsection