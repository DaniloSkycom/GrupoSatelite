<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    
    protected $table = "grd_grado";
    protected $primarykey = "grd_id";

    public function getKeyName(){
        return "grd_id";
    }

}
