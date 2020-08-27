<?php

namespace App\Http\Controllers;
use App\User;
use App\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DokumenController extends Controller
{
    //
    public function index()
    {
        $dok = Dokumen::all();
        return view('dokumen.datadokumen', ['dok' => $dok]);
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
        $fileName = $request->nama_file.'.'.$request->file->extension();  
        // return $fileName;
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
        if(file_exists(public_path('uploads/'.$user->nama_file))){
            unlink(public_path('uploads/'.$user->nama_file));
        }else{
        }
        $user->delete($user);
        return redirect('/datadokumen')->with('sukses', 'Data berhasil dihapus!');
    }

    public function tampilubah($id)
    {
        $dok = Dokumen::find($id);
        $nama_file = $dok->nama_file;
        $nm = explode(".",$nama_file);

        return view('dokumen.ubahdokumen', ['dok' => $dok,'nama_file' => $nm[0]]);

        
    }

    public function ubah(Request $request,$id)
    {
        $a = $request;
        $request->validate([
            'nama_file' => 'required',
        ]);
        $dok = Dokumen::find($id);
        if($request->file != null){
            $fileName = $request->nama_file.'.'.$request->file->extension();  
            // return $fileName;
            $request->file->move(public_path('uploads'), $fileName);
        }
        $dok->update($request->all());

    }

}
