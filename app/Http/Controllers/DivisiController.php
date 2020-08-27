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
        return view('user.user', ['users' => $users]);
    }
}
