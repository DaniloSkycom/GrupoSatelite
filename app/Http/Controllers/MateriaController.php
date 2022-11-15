<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;

class MateriaController extends Controller
{
    
    public function index(){

        $list_all = Materia::all();

        return view("Materia.MateriaView", compact("list_all"));

    }

    public function action(Request $request){

        if ($request->txtId == 0) {
            
            $newrow = new Materia();

        }else{

            $newrow = Materia::find($request->txtId);

        }

        $newrow->mat_nombre = $request->txtNombre;

        $newrow->save();

        $list_all = Materia::all();

        return view("Materia.TableView", compact("list_all"));

    }

    public function eliminar(Request $request){

        Materia::destroy($request->txtId);

        $list_all = Materia::all();

        return view("Materia.TableView", compact("list_all"));

    }

}
