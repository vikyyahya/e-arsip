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
        if (Auth::user()->level == 3) {
            $dok = Dokumen::paginate(5);
            return view('dokumen.datadokumen', ['dokumen' => $dok]);
        }
        $dok = Dokumen::with('user')->wherehas('user', function ($q) {
            $q->where('id', Auth::user()->id);
        })->paginate(5);
        return view('dokumen.datadokumen', ['dokumen' => $dok]);
    }
    public function cari(Request $request)
    {
        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('Error', 'Data tidak di temukan');
        $cari = $request->cari;
        $dok = Dokumen::where('nama_file', 'like', "%" . $cari . "%")
            ->orwhere('keterangan', 'like', "%" . $cari . "%")->paginate(5);

        if (count($dok) == 0) {
            return redirect()->back()->withErrors($errors);;
        } else {
            return view('dokumen.datadokumen', ['dokumen' => $dok]);
        }
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
        return redirect('/datadokumen')->with('suksesdelete', 'Data berhasil dihapus!');
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
        $fileName = $request->nama_file;
        if ($request->file != null) {
            $fileName = $request->nama_file . '.' . $request->file->extension();
            // return $fileName;
            $request->file->move(public_path('uploads'), $fileName);
        } else {
            $extension = explode(".", $dok->nama_file);
            // return $extension[1];
            $fileName = $fileName . '.' . $extension[1];
            // return $fileName;
            rename(public_path('/uploads/' . $dok->nama_file), public_path('/uploads/' . $fileName));
        }
        $request['nama_file'] = $fileName;

        $dok->update($request->all());
        return redirect('/datadokumen')->with('sukses', 'Data berhasil di ubah!');
    }
    public function export($id)
    {
        $dokumen = Dokumen::find($id);
        return view('print.printdokument', ['dokumen' => $dokumen->nama_file]);

        $pdf = PDF::loadview('print.printdokument', ['dokumen' => $dokumen->nama_file]);
        $pdf->save(storage_path() . '/uniquename.pdf');
        return $pdf->stream();

        // return $users;
        // return (new UserReport($users))->download('users.xlsx');
    }
}
