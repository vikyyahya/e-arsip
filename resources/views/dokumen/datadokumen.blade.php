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

<br/>


<a href="/tambahdokumen" class="btn btn-primary ml-3">
    Tambah Dokumen
</a>

<br/>
<br/>

<div class="card .mt-3">

    <div class="card-header ">
        <div class="row">
            <div class="col-sm-9"> <h4>Data Dokumen</h4></div>
            <div class=".col-lg-4">
                <form class="navbar-form" method="post" action="#">
                        <input type="text"  name="search" style="width: 200px" placeholder="Kata kunci pencarian ..." required="">
                        <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"> </i> Cari</button>
                </form>

            </div>
        </div>
       
    </div>

    <div class="card-body">
        <table class="table table-striped table-responsive table table-bordered" id="myTable">
            <thead >
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama File</th>
                    <th class="text-center">Tanggal Upload</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dok ?? '' as $dok)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dok->nama_file}}</td>
                    <td>{{$dok->created_at}}</td>                 
                    <td>{{$dok->keterangan}}</td>                 
                    <td>
                        <div class="btn-group">
                           

                            <a href="/tampilubahdokumen/{{$dok->id}}" class="btn btn-outline-success m-1" data-toggle="tootip"
                                data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a href="#" class="btn btn-outline-info m-1" data-toggle="tootip"
                                data-placement="bottom" title="Edit">
                                <i class="fa fa-print nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="hapusdokumen/{{$dok->id}}"
                            class="btn btn-outline-danger m-1">
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