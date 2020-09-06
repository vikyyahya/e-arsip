@extends('home')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/tambahdivisi" method="POST">

            @csrf

            <div class="card" style="border-top: 3px solid">
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
                        <input type="text" name="diskripsi" placeholder="" class="form-control">
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