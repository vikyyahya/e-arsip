<?php

namespace App\Http\Controllers;

use App\User;
use App\Level;
use App\Divisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function user()
    {
        $users = User::paginate(5);
        return view('user.user', ['users' => $users]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $users = User::where('name', 'like', "%" . $cari . "%")->paginate(5);
        // return $users->link;
        return view('user.user', ['users' => $users]);
    }

    public function tambah_user()
    {
        $level = Level::pluck('nama_level', 'id');
        $divisi = Divisi::pluck('nama_divisi', 'id');

        return view('user.addUser', ['level' => $level, 'divisi' => $divisi]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable',
            'email' => 'unique:users,email',
            'password' => ['required', 'string', 'min:8'],
            'level' => 'nullable',
            'divisi_id' => 'nullable'
        ]);

        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => $data['level'],
            'divisi_id' => $data['divisi_id'],
        ]);
        return redirect('/users')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function ubahuser($id)
    {
        $level = Level::pluck('nama_level', 'id');
        $user = User::find($id);
        $divisi = Divisi::pluck('nama_divisi', 'id');

        return view('user.ubahuser', ['user' => $user, 'level' => $level, 'divisi' => $divisi]);
    }

    public function ubah(Request $request, $id)
    {
        $user = User::find($id);
        $level = Level::pluck('nama_level', 'id');
        if ($request->password != $request->syncpassword) {
            return view('user.ubahuser', ['user' => $user, 'level' => $level, 'erro' => 'Password tidak sama'])->with('errors', 'Password tidak sama');
        } else if ($request->password == '') {
            $user->update($request->except('password'));
        } else {
            $user->update($request->all());
        }
        return redirect('/users')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function hapus($id)
    {
        $user = User::find($id);
        $user->delete($user);
        return redirect('/users')->with('sukses', 'Data berhasil dihapus!');
    }
}
