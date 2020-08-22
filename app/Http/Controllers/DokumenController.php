<?php

namespace App\Http\Controllers;
use App\User;
use App\Dokumen;
use Illuminate\Http\Request;

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
        $request->validate([
            'nama_file' => 'required',
            'file' => 'required|max:2048',
        ]);
        $dok = Dokumen::all();

        $data = $request->all();
        $fileName = $request->nama_file.'.'.$request->file->extension();  
        // return $fileName;
        $request->file->move(public_path('uploads'), $fileName);
        Dokumen::create([
            'nama_file' => $fileName,
            'keterangan' => $data['keterangan']
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

}
