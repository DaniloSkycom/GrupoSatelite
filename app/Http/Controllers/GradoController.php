<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;

class GradoController extends Controller
{
    
    public function index(){

        $list_all = Grado::all();

        return view("Grado.GradoView", compact("list_all"));

    }

    public function action(Request $request){

        if ($request->txtId == 0) {
            
            $newrow = new Grado();

        }else{

            $newrow = Grado::find($request->txtId);

        }

        $newrow->grd_nombre = $request->txtNombre;

        $newrow->save();

        $list_all = Grado::all();

        return view("Grado.TableView", compact("list_all"));

    }

    public function eliminar(Request $request){

        Grado::destroy($request->txtId);

        $list_all = Grado::all();

        return view("Grado.TableView", compact("list_all"));

    }

}
