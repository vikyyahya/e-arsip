<?php

namespace App\Http\Controllers;

use App\User;
use App\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;



class DokumenController extends Controller
{
    //
    public function index()
    {
        $dok = Dokumen::with('user')->wherehas('user', function ($q) {
            $q->where('id', Auth::user()->id);
        })->paginate(5);
        return view('dokumen.datadokumen', ['dokumen' => $dok]);
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $dok = Dokumen::where('nama_file', 'like', "%" . $cari . "%")
            ->orwhere('keterangan', 'like', "%" . $cari . "%")->paginate(5);
        // return $users->link;
        return view('dokumen.datadokumen', ['dokumen' => $dok]);
    }


    public function tambah_dokumen()
    {
        $dok = Dokumen::all();
        return view('dokumen.tambahdokumen', ['dok' => $dok]);
    }

    public function create(Request $request)
    {
        // return $request;
        $request->validate([
            'nama_file' => 'required',
            'file' => 'required|max:2048',
        ]);
        $dok = Dokumen::all();

        $data = $request->all();
        $fileName = $request->nama_file . '.' . $request->file->extension();
        // return $request;
        $request->file->move(public_path('uploads'), $fileName);
        $id_user = Auth::user()->id;
        Dokumen::create([
            'nama_file' => $fileName,
            'keterangan' => $data['keterangan'],
            'uploaded' => $id_user

        ]);
        return redirect('/datadokumen')->with('sukses', 'Data Berhasil Di Upload!');
    }

    public function hapus($id)
    {
        $user = Dokumen::find($id);
        if (file_exists(public_path('uploads/' . $user->nama_file))) {
            unlink(public_path('uploads/' . $user->nama_file));
        } else {
        }
        $user->delete($user);
        return redirect('/datadokumen')->with('sukses', 'Data berhasil dihapus!');
    }

    public function tampilubah($id)
    {
        $dok = Dokumen::find($id);
        $nama_file = $dok->nama_file;
        $nm = explode(".", $nama_file);

        return view('dokumen.ubahdokumen', ['dok' => $dok, 'nama_file' => $nm[0]]);
    }

    public function ubah(Request $request, $id)
    {
        $a = $request;
        $request->validate([
            'nama_file' => 'required',
        ]);
        $dok = Dokumen::find($id);
        if ($request->file != null) {
            $fileName = $request->nama_file . '.' . $request->file->extension();
            // return $fileName;
            $request->file->move(public_path('uploads'), $fileName);
        }
        $dok->update($request->all());
        return redirect('/datadokumen')->with('sukses', 'Data berhasil di ubah!');
    }
    public function export($id)
    {
        $dokumen = Dokumen::find($id);
        return view('print.printdokument', ['dokumen' => $dokumen->nama_file]);

        $pdf = PDF::loadview('print.printdokument', ['dokumen' => $dokumen]);
        $pdf->save(storage_path() . '/uniquename.pdf');
        return $pdf->stream();

        // return $users;
        // return (new UserReport($users))->download('users.xlsx');
    }
}
