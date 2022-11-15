<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    
    protected $table = "mat_materia";
    protected $primarykey = "mat_id";

    public function getKeyName(){
        return "mat_id";
    }

}
