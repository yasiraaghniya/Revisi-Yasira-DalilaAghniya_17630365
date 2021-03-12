<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perjalanandns extends Model
{
    public function pegawaiperjalanandns()
    {
        return $this ->belongsTo('App\Pegawai');
    } 
}
