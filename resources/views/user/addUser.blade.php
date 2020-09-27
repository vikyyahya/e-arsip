@extends('home')

@section('content')

<div class="row">
	<div class="col-md-12 mt-3">
		<form action="/buatuser" method="POST" enctype="multipart/form-data">

			@csrf

			<div class="card m-3">
				<div class="card-header">
					<h3 class="card-title">Tambah User</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="name" value="{{ old('name')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" name="syncpassword" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>Divisi</label>
						{{ Form::select('divisi_id', $divisi, null, ['placeholder' => 'Pilih Divisi...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Level</label>
						{{ Form::select('level', $level, null, ['placeholder' => 'Pilih user level...', 'required', 'class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>Foto</label>

						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="exampleInputFile" name="file">
								<label class="custom-file-label" for="exampleInputFile">Choose file</label>
							</div>

						</div>

					</div>

					<div class="card-footer">

						<a href="/users" class="btn btn-danger">Batal</a>
						&nbsp;&nbsp;
						<input type="submit" value="Simpan" class="pull-right btn btn-primary">

					</div>

				</div>
			</div>
		</form>

	</div>
</div>



@endsection