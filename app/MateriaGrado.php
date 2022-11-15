<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaGrado extends Model
{
    
    protected $table = "mxg_materiaxgrado";
    protected $primarykey = "mxg_id";

    public function getKeyName(){
        return "mxg_id";
    }

}
