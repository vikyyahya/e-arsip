<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    //
    public $table = "divisi";
    protected $fillable = [
        'nama_divisi', 'deskripsi'
    ];
}
