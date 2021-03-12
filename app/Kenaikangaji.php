<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kenaikangaji extends Model
{
    public function pegawaikenaikangaji()
    {
        return $this ->belongsTo('App\Pegawai');
    } 
}
