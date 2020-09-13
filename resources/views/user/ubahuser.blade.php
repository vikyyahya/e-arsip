@extends('home')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/ubahuser/{{$user->id}}" method="POST" enctype="multipart/form-data">

			@csrf

			<div class="card" style="border-top: 3px solid">
				<div class="card-header">
					<h3 class="card-title">Edit User</h3>
				</div>

				<div class="card-body">

					@if(session('errors'))
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="name" value="{{$user->name}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" value="{{$user->email}}" name="email" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" required class="form-control">
					</div>

					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" value="" name="syncpassword" required placeholder="" class="form-control">
					</div>
					<div class="form-group">
						<label>Divisi</label>
						{{ Form::select('divisi_id', $divisi, $user->divisi_id, ['placeholder' => 'Pilih Divisi...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Level</label>
						{{ Form::select('level', $level, $user->level, ['placeholder' => 'Pilih user level...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Foto</label>

						<div class="input-group">
							<div class="custom-file">
								<input type="file" value="{{ URL::asset('/uploads/'.$user->foto) }}" class="custom-file-input" id="exampleInputFile" name="file">
								<label value="{{$user->foto}}" class="custom-file-label" for="exampleInputFile">{{$user->foto ?? 'Choose file'}}</label>
							</div>

						</div>

					</div>

					<div class="card-footer">

						<a href="/user" class="btn btn-default">Back</a>
						&nbsp;&nbsp;
						<input type="submit" value="Save" class="pull-right btn btn-primary">

					</div>

				</div>
			</div>
		</form>

	</div>
</div>



@endsection