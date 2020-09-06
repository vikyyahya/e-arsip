@extends('home')

@section('content')

{{-- Notifikasi form validasi --}}
@if ($errors->has('file'))
<span class="invalid-feedback" role="alert">
    <strong>{{$errors->first('file')}}</strong>
</span>
@endif

{{-- notifikasi sukses --}}
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="icon fas fa-check"></i> {{ $sukses }}
</div>
@endif

<br />


<a href="/tambahdivisi" class="btn btn-primary ml-3">
    Tambah Divisi
</a>

<br />
<br />

<div class="card .mt-3">

    <div class="card-header ">
        <h4>Divisi</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-responsive table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Divisi</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users ?? '' as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->nama_divisi}}</td>
                    <td>{{$user->deskripsi}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="/tampilubahdivisi/{{$user->id}}" class="btn btn-outline-success m-1" data-toggle="tootip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>
                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="hapusdivisi/{{$user->id}}" class="btn btn-outline-danger m-1">
                                <i class="fa fa-trash nav-icon"></i>
                            </a>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection