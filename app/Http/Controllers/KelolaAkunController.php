<?php

namespace App\Http\Controllers;


use App\User;
use App\Level;
use App\Divisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelolaAkunController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $foto = '';
        if (Auth::user()->foto == null) {
            $foto = 'no_picture.png';
        } else {
            $foto = Auth::user()->foto;
        }
        return view('kelolaakun.kelola_akun', ['user' => $user, 'foto' => $foto]);
    }

    public function ubah(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'old_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8'],

        ]);

        $user = User::find($id);
        $divisi = Divisi::pluck('nama_divisi', 'id');
        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('Error', 'Konfirmasi password tidak sama');
        $data = $request->all();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect('/kelolaakun')->with('error', 'Password lama tidak sama!');
        } else {

            if ($request->file == null) {
                $user->update([
                    'name' => $data['name'],
                    'password' => Hash::make($data['new_password']),
                ]);
            } else {
                $data = $request->all();
                $date_time = date("Y-m-d h:i:s", time());
                $fileName = Auth::user()->name . $date_time . '.' . $request->file->extension();
                $fileName = str_replace(' ', '_', $fileName);
                $request->file->move(public_path('uploads'), $fileName);
                $user->update([
                    'name' => $data['name'],
                    'foto' => $fileName,
                    'password' => Hash::make($data['new_password']),
                ]);
            }

            return redirect('/kelolaakun')->with('sukses', 'Data Berhasil Di Ubah!');
        }
    }
}
