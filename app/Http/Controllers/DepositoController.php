<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepositoRequest;
use App\Http\Requests\UpdateDepositoRequest;
use App\Models\Deposito;
use App\Repositories\DepositoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;

class DepositoController extends AppBaseController
{
    /** @var  DepositoRepository */
    private $depositoRepository;

    public function __construct(DepositoRepository $depositoRepo)
    {
        $this->depositoRepository = $depositoRepo;
    }

    /**
     * Display a listing of the Deposito.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$depositos = $this->depositoRepository->all();
        $email = Auth::user()->email;
        //$proyecto = DB::table('OperacionesDet')->where('id_proyecto', '=', $est)->orderBy('fecha', 'desc')->paginate(60);
        //dd($proyecto);
        $totales = "SELECT ge.id, ge.nombre, pr.nombre, pr.no_proyecto, dep.fecha_deposito, dep.tipo_traslado, dep.ingreso_dep_central, dep.ingreso_dep_cliente, dep.fecha_venta, dep.folios_traslado
                    FROM  depositos_diarios.proyecto pr
                    inner join depositos_diarios.gerentes ge
                    inner join depositos_diarios.depositos dep
                    on pr.id_gerentes = ge.id
                    where ge.email = '$email'";
        $result1 = DB::SELECT($totales);
        //dd(Auth::user()->id, $result1);

        return view('depositos.index')
            ->with('depositos', $result1);
    }

    /**
     * Show the form for creating a new Deposito.
     *
     * @return Response
     */
    public function create()
    {
        return view('depositos.create');
    }

    /**
     * Store a newly created Deposito in storage.
     *
     * @param CreateDepositoRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositoRequest $request)
    {
        $input = $request->all();

        $deposito = $this->depositoRepository->create($input);

        Flash::success('Deposito saved successfully.');

        return redirect(route('depositos.index'));
    }

    /**
     * Display the specified Deposito.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        return view('depositos.show')->with('deposito', $deposito);
    }

    /**
     * Show the form for editing the specified Deposito.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        return view('depositos.edit')->with('deposito', $deposito);
    }

    /**
     * Update the specified Deposito in storage.
     *
     * @param int $id
     * @param UpdateDepositoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositoRequest $request)
    {
        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        $deposito = $this->depositoRepository->update($request->all(), $id);

        Flash::success('Deposito updated successfully.');

        return redirect(route('depositos.index'));
    }

    /**
     * Remove the specified Deposito from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        $this->depositoRepository->delete($id);

        Flash::success('Deposito deleted successfully.');

        return redirect(route('depositos.index'));
    }

    public function DownloadImg($id)
    {
        $imagen = Deposito::find($id);
        //dd($imagen);
        $bin = base64_decode($imagen->archivo_pago);
        $path = "foto/" . $id . '-' . $imagen->created_at . ".jpeg";
        //dd($path);
        // Obtain the original content (usually binary data)
        // Load GD resource from binary data
        $im = imageCreateFromString($bin);
        //dd($im);
        // Make sure that the GD library was able to load the image
        // This is important, because you should not miss corrupted or unsupported images
        if (!$im) {
            die('Base64 value is not a valid image');
        }

        file_put_contents($path, $bin);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($path) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        flush(); // Flush system output buffer
        readfile($path);
        unlink($path);
    }

}
