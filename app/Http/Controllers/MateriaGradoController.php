<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MateriaGrado;
use App\Grado;
use App\Materia;

class MateriaGradoController extends Controller
{
    
    public function index(){

        $list_all = MateriaGrado::select("grd_grado.*", "mat_materia.*", "mxg_materiaxgrado.*")->join("grd_grado", "mxg_materiaxgrado.mxg_id_grd", "=", "grd_grado.grd_id")->join("mat_materia", "mxg_materiaxgrado.mxg_id_mat", "=", "mat_materia.mat_id")->get();
        $list_grado = Grado::all();
        $list_materia = Materia::all();

        return view("MateriaGrado.MateriaGradoView", compact("list_all", "list_grado", "list_materia"));

    }

    public function action(Request $request){

        foreach ($request->slcMateria as $key => $value) {

            $newrow = new MateriaGrado();

            $newrow->mxg_id_grd = $request->slcGrado;
            $newrow->mxg_id_mat = $value;
            
            $newrow->save();

        }

        $list_all = MateriaGrado::select("grd_grado.*", "mat_materia.*", "mxg_materiaxgrado.*")->join("grd_grado", "mxg_materiaxgrado.mxg_id_grd", "=", "grd_grado.grd_id")->join("mat_materia", "mxg_materiaxgrado.mxg_id_mat", "=", "mat_materia.mat_id")->get();

        return view("MateriaGrado.TableView", compact("list_all"));

    }

    public function eliminar(Request $request){

        MateriaGrado::destroy($request->txtId);

        $list_all = MateriaGrado::select("grd_grado.*", "mat_materia.*", "mxg_materiaxgrado.*")->join("grd_grado", "mxg_materiaxgrado.mxg_id_grd", "=", "grd_grado.grd_id")->join("mat_materia", "mxg_materiaxgrado.mxg_id_mat", "=", "mat_materia.mat_id")->get();

        return view("MateriaGrado.TableView", compact("list_all"));

    }

}
