<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    //

    public $table = "dokumen";

    protected $fillable = [
        'nama_file', 'keterangan', 'uploaded',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'uploaded', 'id');
    }
}
