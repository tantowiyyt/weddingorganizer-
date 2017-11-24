@extends('welcome')

	@section('title', '| Login Page')



	@section('content')

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Login User</h1>
				<hr>
				<form>
					<label for="email">Email : </label>
					<input type="email" name="email" id="email" class="form-control">

					<label for="password" style="margin-top:10;">Password : </label>
					<input type="password" name="password" id="password" class="form-control">

					<section style="margin-top:10px;">
						<h5>Tidak Punya Akun ? Daftar <a href="">disini</a></h5>
						<input type="submit" value="Login" class="btn btn-success">
					</section>

				</form>
			</div>	
		</div>

	@endsection