<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;

class DivisiController extends Controller
{
    //

    public function index()
    {
        $users = Divisi::paginate(5);
        return view('divisi.divisi', ['users' => $users]);
    }

    public function cari(Request $request)
    {
        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('Error', 'Data tidak di temukan');
        $cari = $request->cari;

        $users = Divisi::where('nama_divisi', 'like', '%' . $cari . "%")->paginate(5);

        if (count($users) == 0) {
            return redirect()->back()->withErrors($errors);;
        } else {
            return view('divisi.divisi', ['users' => $users]);
        }
    }

    public function tambahdivisi()
    {
        $users = Divisi::all();
        return view('divisi.add_divisi', ['users' => $users]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_divisi' => 'required',
            'deskripsi' => 'required',

        ]);
        $data = $request->all();
        Divisi::create($data);

        $users = Divisi::all();
        return redirect('/divisi')->with('sukses', 'Data Berhasil Di Input');
    }

    public function delete($id)
    {
        $divisi = Divisi::find($id);
        $users = Divisi::all();

        $divisi->delete();
        return redirect('/divisi')->with('error', 'Data Berhasil Di Hapus!');
    }
    public function ubahdivisi($id)
    {
        $divisi = Divisi::find($id);
        return view('divisi.edit_divisi', ['divisi' => $divisi]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $divisi = Divisi::find($id);
        $divisi->update($data);
        return redirect('/divisi')->with('sukses', 'Data Berhasil Di Input');
    }
}
