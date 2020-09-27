@extends('home')

@section('content')

<div class="row">
    <div class="col-md-12 mt-4">
        <form action="/createdivisi" method="POST">

            @csrf

            <div class="card m-3">
                <div class="card-header">
                    <h3 class="card-title">Tambah Divisi</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Nama Divisi</label>
                        <input type="text" name="nama_divisi" value="{{ old('nama_divisi')}}" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" placeholder="" class="form-control">
                    </div>

                    <div class="card-footer">

                        <a href="/user" class="btn btn-default">Batal</a>
                        &nbsp;&nbsp;
                        <input type="submit" value="Simpan" class="pull-right btn btn-primary">

                    </div>

                </div>
            </div>
        </form>

    </div>
</div>



@endsection