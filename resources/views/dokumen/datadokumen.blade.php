@extends('home')

@section('content')
<script type="text/javascript">
    $(document).ready(function() {
        $('.btnprn').printPage();
    });
</script>
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

@if ($suksesdelete = Session::get('suksesdelete'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="icon fas fa-check"></i> {{ $suksesdelete }}
</div>
@endif

{{-- notifikasi sukses --}}
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="icon fas fa-check"></i> {{ $sukses }}
</div>
@endif

<br />

@if(Auth::user()->level == 2)
<a href="/tambahdokumen" class="btn btn-primary ml-3">
    Tambah Dokumen
</a>
@endif

<br />
<br />

<div class="card .mt-3">

    <div class="card-header ">
        <h4>Data Dokumen</h4>
        <div class="card-tools mr-1">
            <form action="/dokumen/cari" method="GET">
                @csrf
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="cari" class="form-control float-right" placeholder="Cari Nama/Keterangan">
                    <div class="input-group-append">
                        <button type="submit" value="cari" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped  table table-bordered" id="myTable">
            <thead>
                <tr class="table-primary">
                    <th class="text-center">No</th>
                    <th class="text-center">Nama File</th>
                    <th class="text-center">Tanggal Upload</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dokumen ?? '' as $dok)
                <tr>
                    <td>{{ ($dokumen->currentpage()-1) * $dokumen->perpage() + $loop->index + 1 }}</td>

                    <td>{{$dok->nama_file}}</td>
                    <td>{{$dok->created_at}}</td>
                    <td>{{$dok->keterangan}}</td>
                    <td>
                        <div class="btn-group">

                            @if (Auth::user()->level == 2)
                            <a href="/tampilubahdokumen/{{$dok->id}}" class="btn btn-outline-success m-1" data-toggle="tootip" data-placement="bottom" title="Ubah">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>
                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="/hapusdokumen/{{$dok->id}}" class="btn btn-outline-danger m-1" title="Hapus">
                                <i class="fa fa-trash nav-icon"></i>
                            </a>

                            @endif

                            <a href="/export_dokumen/{{$dok->id}}" class="btnprn btn btn-outline-info m-1" data-toggle="tootip" data-placement="bottom" title="Cetak">
                                <i class="fa fa-print nav-icon"></i>
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
            {{$dokumen->links()}}
        </ul>
    </div>
</div>


@endsection