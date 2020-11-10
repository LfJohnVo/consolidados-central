<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flash;

class DesgloseController extends Controller
{
    public function index()
    {
        return view('desglose.index');
    }

    public function buscar()
    {
        $input = request()->validate([
            "_token" => [''],
            "primero" => [''],
            "segundo" => [''],
            "radio" => ['']
        ]);
        //$input = \request()->all();
        $diap = substr($input['primero'], -2);
        $mesp = substr($input['primero'], -5, 2);
        $anop = substr($input['primero'], -10, 4);
        $dias = substr($input['segundo'], -2);
        $mess = substr($input['segundo'], -5, 2);
        $anos = substr($input['segundo'], -10, 4);
        //dd($input, $diap, $mesp, $anop);


        if ($input['radio'] == 1) {
            //dd("busqueda por mes");
            /*$desglose = "select  sum(no_operaciones) \"operacionesactuales\",
        (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
       where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '$mesp' and year(fecha) = '$anop' and cg.grupo = cg.grupo) \"operacioneshistorico\",
        (sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
       where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '$mesp' and year(fecha) = '$anop' and cg.grupo = cg.grupo)) /
       (select sum(no_operaciones) from Operaciones_Det_Historico
       where month(fecha) = '$mesp' and year (fecha) = '$anop') * 100 \"porcentaje\",
       sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico
       where month(fecha) = '$mesp' and year(fecha) = '$anop') as \"variacion\", pr.nombre \"proyecto\", cg.grupo  \"grupo\"
       from OperacionesDet opd, proyecto pr, cat_grupos cg
        where opd.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and  month (fecha) = '$mess' and year (fecha) = '$anos' #and cg.grupo = ''";*/

            $desglose = "select  sum(no_operaciones) \"operacionesactuales\", (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
            where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '$mesp' and year(fecha) = '$anop' and cg.grupo = cg.grupo) \"operacioneshistorico\",
            ((sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
            where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '$mesp' and year(fecha) = '$anop' and cg.grupo = cg.grupo))) / (select sum(no_operaciones) from Operaciones_Det_Historico pdh,                                 cat_grupos gr, proyecto pr
            where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '$mesp' and year(fecha) = '$anop' and cg.grupo = cg.grupo) *100 \"porcentaje\",
             sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
            where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '$mesp' and year(fecha) = '$anop' and cg.grupo = cg.grupo) as \"variacion\",
            AVG(tickets) \"tickets\", pr.nombre \"proyecto\", cg.grupo  \"grupo\" from OperacionesDet opd, proyecto pr, cat_grupos cg
            where opd.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and  month (fecha) = '$mess' and year (fecha) = '$anos' #and cg.grupo = ''";
            $result1 = DB::SELECT($desglose);
            //dd($desglose);
            //dd($result1);
            if (empty($result1)) {
                Flash::error('Sin resultados');

                return redirect(route('desglose.show'));
            }

            return view('desglose.show')->with('resultados', $result1);
        } else {
            $desglose = "select  sum(no_operaciones) \"operacionesactuales\", (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
            where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and year (fecha) = '$anop'  and cg.grupo = cg.grupo) \"operacioneshistorico\", ((sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
             where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and year (fecha) = '$anop'  and cg.grupo = cg.grupo))) /
            (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
           where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and year (fecha) = '$anop' and cg.grupo = cg.grupo) *100 \"porcentaje\",
           sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
          where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and year (fecha) = '$anop' and cg.grupo = cg.grupo) as \"variacion\",
           AVG(tickets) \"tickets\", pr.nombre \"proyecto\", cg.grupo  \"grupo\" from OperacionesDet opd, proyecto pr, cat_grupos cg where opd.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos
            and  year (fecha) = '$anos' #and cg.grupo = ''";
            //dd($desglose);
            $result1 = DB::SELECT($desglose);
            //dd($result1);
            if (empty($result1)) {
                Flash::error('Sin resultados');

                return redirect(route('desglose.show'));
            }

            return view('desglose.show')->with('resultados', $result1);
        }
    }
}
