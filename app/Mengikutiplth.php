<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengikutiplth extends Model
{
    public function pegawaiplth()
    {
        return $this ->belongsTo('App\Pegawai');
    } 
}
