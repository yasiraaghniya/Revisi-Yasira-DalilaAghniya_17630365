<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Melaksanakantgs extends Model
{
    public function pegawaimtgs()
    {
        return $this ->belongsTo('App\Pegawai');
    } 
}
