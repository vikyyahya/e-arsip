@extends('home')

@section('content')

<div>
    <div id="img_profile" onclick="upload" class="text-center mt-5">
        <img class="profile-user-img img-fluid img-circle my-3" style="width:200px; height:200px;" src="{{ URL::to('/') }}/uploads/{{$foto}}" alt="User profile picture">
    </div>

    <h3 class="profile-username text-center">{{$user->name}}</h3>

    <p class="text-muted text-center">{{$user->divisi->nama_divisi}}</p>

    @if($errors->any())
    <div class="alert alert-danger">
        {{implode('', $errors->all(':message'))}}
    </div>
    @endif

    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-check"></i> {{ $sukses }}
    </div>
    @endif

    @if ($error = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-check"></i> {{ $error }}
    </div>
    @endif

    <form action="/ubahprofil/{{$user->id}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Profil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{$user->name}}" placeholder="" class="form-control" required autofocus>
                </div>

                <!-- <div class="form-group">
                    <label>Password lama</label>
                    <input type="password" name="old_password" required placeholder="" class="form-control">
                </div> -->

                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="old_password" required placeholder="" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="new_password" required placeholder="" class="form-control">
                </div>

                <div class="form-group">
                    <label>Foto</label>

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                            <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                        </div>

                    </div>

                </div>

                <input type="submit" value="Ubah Profil" class="pull-right btn btn-primary">

            </div>

        </div>

    </form>

</div>



@endsection