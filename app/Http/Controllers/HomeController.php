<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use Flash;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d 18:00.00');
        $año = date('Y');
        $añoA = date('Y', strtotime('-1 year'));

        $sql = "select distinct (pr.no_proyecto) as numero_proyecto, pr.Nombre as nombre_proyecto,
        grt . email as correo
        from OperacionesDet odt, proyecto pr, gerentes grt
        where odt.id_proyecto = pr.id
        and pr.id_gerentes = grt.id
        and odt.fecha < '$date' and odt.estatus = 0;";
        $result = DB::SELECT($sql);
        //dd($result);

        $desglose = "select  sum(opd.no_operaciones) 'operacionesactuales',
            (select sum(pdh.no_operaciones) from Operaciones_Det_Historico pdh, proyecto pr
            where pdh.id_proyecto = pr.id and pdh.id_proyecto = opd.id_proyecto and month(fecha) = month(current_date()) and year(fecha) = year(current_date() - interval 1 year)) 'operacioneshistorico',
            ((sum(opd.no_operaciones) - (select sum(pdh.no_operaciones) from Operaciones_Det_Historico pdh, proyecto pr
            where pdh.id_proyecto = pr.id and pdh.id_proyecto = opd.id_proyecto and  month(fecha) = month(current_date()) and year(fecha) = year(current_date() - interval 1 year)))) / (select sum(pdh.no_operaciones) from Operaciones_Det_Historico pdh,                                 cat_grupos gr, proyecto pr
            where pdh.id_proyecto = pr.id and pdh.id_proyecto = opd.id_proyecto and month(fecha) = month(current_date()) and year(fecha) = year(current_date() - interval 1 year)) *100 'porcentaje',
             sum(opd.no_operaciones) - (select sum(pdh.no_operaciones) from Operaciones_Det_Historico pdh, proyecto pr
            where pdh.id_proyecto = pr.id  and pdh.id_proyecto = opd.id_proyecto and month(fecha) = month(current_date()) and year(fecha) = year(current_date - interval 1 year)) as 'variacion',
            AVG(opd.tickets) 'tickets', pr.nombre 'proyecto' from OperacionesDet opd, proyecto pr, cat_grupos cg
            where opd.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and  month(fecha) = month(current_date()) and year(fecha) = year(current_date()) group by proyecto, fecha
            having operacioneshistorico > 1";
        //dd($desglose);
        $result1 = DB::SELECT($desglose);
        $mesesarray = array(
            '1' => 'Enero',
            '2' => 'Febrero',
            '3' => 'Marzo',
            '4' => 'Abril',
            '5' => 'Mayo',
            '6' => 'Junio',
            '7' => 'Julio',
            '8' => 'Agosto',
            '9' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        );

        return view('home')->with('sqls', $result)->with('desgloses', $result1)->with('mesesarray', $mesesarray);
    }

    public function enviarEmail()
    {
        //dd("Enviar email");
        $date = date('Y-m-d 18:00.00');
        $sql = "select pr . no_proyecto as numero_proyecto, pr . Nombre as nombre_proyecto,
        grt . email as correo
        from OperacionesDet odt, proyecto pr, gerentes grt
        where odt . id_proyecto = pr . id
        and pr . id = grt . id_proyecto
        and odt . fecha < '$date' and odt . estatus = 0";
        $result = DB::SELECT($sql);
        //dd($result);
        foreach ($result as $email) {
            $correo = $email->correo;
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.office365.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "notificacionportal@central-mx.com";
            $mail->Password = "C3ntr4l_2020";
            $mail->setFrom('facturacion-oce@central-mx.com', 'Operadora central de estacionamientos');
            //$mail->From = "no - reply@central - mx . com";
            //$mail->FromName = "Central operadora de estacionamientos";
            $mail->Subject = "Operaciones";
            $mail->Body = "<html>
                    <meta charset = 'utf-8' >
                    <h4 style = 'font-color: green;' align = 'center';>Central Operadora de Estacionamientos SAPI S . A . de C . V .</h4 >
                    <p align = 'center;' > Buenas tardes gerente .</p >
                    <p align = 'center;' > Se te solicita cargues tus operaciones del dia de manera inmediata .</p >
                    </html>";
            $mail->AddAddress($correo);
            $mail->IsHTML(true);
            $mail->Send();

            Flash::success('Correos enviados satisfactoriamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>');
            return redirect(route('home'));

        }

    }

    public function export()
    {
        //dd("reporte");
        $input = \request()->all();
        $date = $input['Fecha'];
        $final = $input['Fecha_final'];
        //$date = date('Y-m-d');
        $año = date('Y');
        $añoA = date('Y', strtotime('-1 year'));
        $desglose = "SELECT DISTINCT
    (pr.no_proyecto) AS numero_proyecto,
    pr.Nombre AS nombre_proyecto,
    date_format(odt.fecha, '%d-%m-%Y') as fecha,
    SUM(odt.no_operaciones) AS operaciones_dia,
    cco.descripcion
FROM
    OperacionesDet odt,
    proyecto pr,
    gerentes grt,
    cat_conceptos cco
WHERE
    odt.id_proyecto = pr.id
        AND odt.id_concepto = cco.id_catalogo
        AND pr.id_gerentes = grt.id
        AND DATE_FORMAT(odt.fecha, '%Y-%m-%d') BETWEEN '$date' AND '$final'
GROUP BY pr.no_proyecto";
        //dd($desglose);
        $result1 = DB::SELECT($desglose);
        //dd($result1);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No.Proyecto');
        $sheet->setCellValue('B1', 'Proyecto');
        $sheet->setCellValue('C1', 'Fecha');
        $sheet->setCellValue('D1', 'No.Operaciones');
        $sheet->setCellValue('E1', 'Descripcion');

        $aDatos = array();

        $contador = 2;
        foreach ($result1 as $item) {
            $sheet->setCellValue('A' . $contador, $item->numero_proyecto);
            $sheet->setCellValue('B' . $contador, $item->nombre_proyecto);
            $sheet->setCellValue('C' . $contador, $item->fecha);
            $sheet->setCellValue('D' . $contador, $item->operaciones_dia);
            $sheet->setCellValue('E' . $contador, $item->descripcion);
            $contador = $contador + 1;
        }

        //dd($aDatos, $result1);

        $writer = new Xlsx($spreadsheet);
        $nombre = "reporte-" . $date;
        $writer->save($nombre . '.xlsx');
        return response()->download(public_path($nombre . '.xlsx'))->deleteFileAfterSend(true);


        //dd("termino");
        //return Excel::download($result1, 'reporte-' . $date . '.xlsx');
    }

}
