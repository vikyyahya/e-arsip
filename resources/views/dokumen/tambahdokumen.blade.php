@extends('home')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/unggahdokumen" method="POST"  enctype="multipart/form-data">

			@csrf

			<div class="card" style="border-top: 3px solid">
				<div class="card-header">
					<h3 class="card-title">Tambah Dokumen</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama File</label>
						<input type="text" name="nama_file" value="{{ old('name')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" name="keterangan" placeholder="" class="form-control">
					</div>

					<div class="form-group">
                        <label>File</label>

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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