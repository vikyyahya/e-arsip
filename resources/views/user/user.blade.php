@extends('home')

@section('content')

{{-- Notifikasi form validasi --}}
@if ($errors->has('file'))
<span class="invalid-feedback" role="alert">
    <strong>{{$errors->first('file')}}</strong>
</span>
@endif

@if($errors->any())
<div class="alert alert-danger">
    {{implode('', $errors->all(':message'))}}
</div>
@endif

{{-- notifikasi sukses --}}
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="icon fas fa-check"></i> {{ $sukses }}
</div>
@endif

@if ($suksesdelete = Session::get('suksesdelete'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="icon fas fa-check"></i> {{ $suksesdelete }}
</div>
@endif

<br />


<a href="/tambahuser" class="btn btn-primary ml-3">
    Tambah User
</a>

<br />
<br />

<div class="card .mt-3">

    <div class="card-header ">
        <h4>User</h4>
        <div class="card-tools mr-1">
            <form action="/users/cari" method="GET">
                @csrf
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="cari" class="form-control float-right" placeholder="Cari Nama">
                    <div class="input-group-append">
                        <button type="submit" value="cari" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped table-responsive table table-bordered" id="myTable">
            <thead>
                <tr class="table-primary">
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Divisi</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Level</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users ?? '' as $user)
                <tr>
                    <td>{{ ($users->currentpage()-1) * $users->perpage() + $loop->index + 1 }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->divisi->nama_divisi ?? '-'}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->levels->nama_level}}</td>
                    <td>
                        <div class="btn-group">


                            <a href="/tampilubahuser/{{$user->id}}" class="btn btn-outline-success m-1" data-toggle="tootip" data-placement="bottom" title="Ubah">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="hapususer/{{$user->id}}" class="btn btn-outline-danger m-1" title="Hapus">
                                <i class="fa fa-trash nav-icon"></i>
                            </a>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{$users->links()}}
        </ul>
    </div>
</div>


@endsection