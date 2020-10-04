<?php

namespace App\Http\Controllers;

use App\User;
use App\Level;
use App\Divisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('Error', 'Data tidak di temukan');
        $cari = $request->cari;

        $cari = $request->cari;

        $users = User::where('name', 'like', "%" . $cari . "%")->paginate(5);
        // return $users->link;

        if (count($users) == 0) {
            return redirect()->back()->withErrors($errors);;
        } else {
            return view('user.user', ['users' => $users]);
        }
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
            'divisi_id' => 'nullable',
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',

        ]);

        $data = $request->all();
        $date_time = date("Y-m-d h:i:s", time());
        $fileName = Auth::user()->name . $date_time . '.' . $request->file->extension();
        $fileName = str_replace(' ', '', $fileName);
        $fileName = str_replace(':', '', $fileName);
        $fileName = str_replace('-', '', $fileName);
        $fileName = str_replace('_', '', $fileName);
        $request->file->move(public_path('uploads'), $fileName);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => $data['level'],
            'divisi_id' => $data['divisi_id'],
            'foto' => $fileName,

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
        $this->validate($request, [
            'name' => 'nullable',
            'email' => 'required',
            'level' => 'nullable',
            'divisi_id' => 'nullable',

        ]);

        $user = User::find($id);
        $level = Level::pluck('nama_level', 'id');
        $divisi = Divisi::pluck('nama_divisi', 'id');
        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('Error', 'Konfirmasi password tidak sama');


        if ($request->password != $request->syncpassword) {
            return redirect()->back()->withErrors($errors);;
            return view('user.ubahuser', ['divisi' => $divisi, 'user' => $user, 'level' => $level, 'erro' => 'Password tidak sama'])->with('errors', 'Password tidak sama');
        } else if ($request->file == null) {
            $data = $request->all();

            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'level' => $data['level'],
                'divisi_id' => $data['divisi_id'],
            ]);
        } else if ($request->password == '') {
            $data = $request->all();
            $date_time = date("Y-m-d h:i:s", time());
            $fileName = Auth::user()->name . $date_time . '.' . $request->file->extension();
            $fileName = str_replace(' ', '', $fileName);
            $fileName = str_replace(':', '', $fileName);
            $fileName = str_replace('-', '', $fileName);
            $fileName = str_replace('_', '', $fileName);
            $request->file->move(public_path('uploads'), $fileName);
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'level' => $data['level'],
                'divisi_id' => $data['divisi_id'],
                'foto' => $fileName,
            ]);

            // $user->update($request->except('password', 'foto'));
            // $user->foto = $fileName;
            // $user->update($request);
        } else {
            $data = $request->all();
            $date_time = date("Y-m-d h:i:s", time());
            $fileName = Auth::user()->name . $date_time . '.' . $request->file->extension();
            $fileName = str_replace(' ', '_', $fileName);
            $request->file->move(public_path('uploads'), $fileName);
            $pass =  Hash::make($request->password);
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'level' => $data['level'],
                'divisi_id' => $data['divisi_id'],
                'foto' => $fileName,
            ]);
            // $user->update($request->except('password', 'foto'));
            // $user->password = $pass;
            // $user->foto = $fileName;
            // $user->update();
        }
        return redirect('/users')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function hapus($id)
    {
        $user = User::find($id);
        $user->delete($user);
        return redirect('/users')->with('suksesdelete', 'Data berhasil dihapus!');
    }
}
