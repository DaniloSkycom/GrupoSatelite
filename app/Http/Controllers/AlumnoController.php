<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Grado;
use App\MateriaGrado;

class AlumnoController extends Controller
{
    
    public function index(){

        $list_all = Alumno::select("grd_grado.*", "alm_alumno.*")->join("grd_grado", "grd_grado.grd_id", "=", "alm_alumno.alm_id_grd")->get();
        $list_grado = Grado::all();

        return view("Alumno.AlumnoView", compact("list_all", "list_grado"));

    }

    public function action(Request $request){

        if ($request->txtId == 0) {
            
            $newrow = new Alumno();

        }else{

            $newrow = Alumno::find($request->txtId);

        }

        $newrow->alm_codigo = $request->txtCodigo;
        $newrow->alm_nombre = $request->txtNombre;
        $newrow->alm_edad = $request->txtEdad;
        $newrow->alm_sexo = $request->slcSexo;
        $newrow->alm_id_grd = $request->slcGrado;
        $newrow->alm_observacion = $request->txtObservacion;

        $newrow->save();

        $list_all = Alumno::select("grd_grado.*", "alm_alumno.*")->join("grd_grado", "grd_grado.grd_id", "=", "alm_alumno.alm_id_grd")->get();

        return view("Alumno.TableView", compact("list_all"));

    }

    public function eliminar(Request $request){

        Alumno::destroy($request->txtId);

        $list_all = Alumno::select("grd_grado.*", "alm_alumno.*")->join("grd_grado", "grd_grado.grd_id", "=", "alm_alumno.alm_id_grd")->get();

        return view("Alumno.TableView", compact("list_all"));

    }

    public function report(){

        $list_all = Alumno::select("grd_grado.*", "alm_alumno.*")->join("grd_grado", "grd_grado.grd_id", "=", "alm_alumno.alm_id_grd")->get();
        $list_grado = Grado::all();

        $listFinal = array();

        foreach ($list_all as $key => $value) {

            $materiasxalumno = MateriaGrado::where("mxg_materiaxgrado.mxg_id_grd", "=", $value["grd_id"])->select("mat_materia.*", "mxg_materiaxgrado.*")->join("mat_materia", "mxg_materiaxgrado.mxg_id_mat", "=", "mat_materia.mat_id")->get();
            
            $listFinal[$value["alm_id"]] = $value;
            $listFinal[$value["alm_id"]]["Materias"] = $materiasxalumno;

        }

        return view("Alumno.ReportView", compact("list_all", "list_grado", "listFinal"));

    }

    public function findReport(Request $request){

        if ($request->valor == "ALL") {
            
            $list_all = Alumno::select("grd_grado.*", "alm_alumno.*")->join("grd_grado", "grd_grado.grd_id", "=", "alm_alumno.alm_id_grd")->get();
            
        }else{

            $list_all = Alumno::where("alm_alumno.alm_id", "=", $request->valor)->select("grd_grado.*", "alm_alumno.*")->join("grd_grado", "grd_grado.grd_id", "=", "alm_alumno.alm_id_grd")->get();

        }


        $listFinal = array();

        foreach ($list_all as $key => $value) {

            $materiasxalumno = MateriaGrado::where("mxg_materiaxgrado.mxg_id_grd", "=", $value["grd_id"])->select("mat_materia.*", "mxg_materiaxgrado.*")->join("mat_materia", "mxg_materiaxgrado.mxg_id_mat", "=", "mat_materia.mat_id")->get();
            
            $listFinal[$value["alm_id"]] = $value;
            $listFinal[$value["alm_id"]]["Materias"] = $materiasxalumno;

        }

        return view("Alumno.TableReportView", compact("listFinal"));

    }

}
