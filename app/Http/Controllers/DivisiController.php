<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;

class DivisiController extends Controller
{
    //

    public function index()
    {
        $users = Divisi::all();
        return view('divisi.divisi', ['users' => $users]);
    }

    public function tambahdivisi()
    {
        $users = Divisi::all();
        return view('divisi.add_divisi', ['users' => $users]);
    }
}
