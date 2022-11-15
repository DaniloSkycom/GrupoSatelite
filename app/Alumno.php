<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    
    protected $table = "alm_alumno";
    protected $primarykey = "alm_id";

    public function getKeyName(){
        return "alm_id";
    }

}
