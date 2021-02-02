<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGerenteRequest;
use App\Http\Requests\UpdateGerenteRequest;
use App\Models\Concepto;
use App\Models\Distrital;
use App\Repositories\GerenteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Response;
use App\Models\OperacionDet;

class GerenteController extends AppBaseController
{
    /** @var  GerenteRepository */
    private $gerenteRepository;

    public function __construct(GerenteRepository $gerenteRepo)
    {
        $this->gerenteRepository = $gerenteRepo;
    }

    /**
     * Display a listing of the Gerente.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $gerentes = $this->gerenteRepository->all();

        return view('gerentes.index')
            ->with('gerentes', $gerentes);
    }

    /**
     * Show the form for creating a new Gerente.
     *
     * @return Response
     */
    public function create()
    {
        $distrital = Distrital::all();

        return view('gerentes.create')->with('distritals', $distrital);
    }

    /**
     * Store a newly created Gerente in storage.
     *
     * @param CreateGerenteRequest $request
     *
     * @return Response
     */
    public function store(CreateGerenteRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $gerente = $this->gerenteRepository->create($input);

        Flash::success('Gerente añadido.');

        return redirect(route('gerentes.index'));
    }

    /**
     * Display the specified Gerente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gerente = $this->gerenteRepository->find($id);

        if (empty($gerente)) {
            Flash::error('Gerente not found');

            return redirect(route('gerentes.index'));
        }

        return view('gerentes.show')->with('gerente', $gerente);
    }

    /**
     * Show the form for editing the specified Gerente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gerente = $this->gerenteRepository->find($id);

        $distrital = Distrital::all();

        if (empty($gerente)) {
            Flash::error('Gerente not found');

            return redirect(route('gerentes.index'));
        }

        return view('gerentes.edit')->with('gerente', $gerente)->with('distritals', $distrital);
    }

    /**
     * Update the specified Gerente in storage.
     *
     * @param int $id
     * @param UpdateGerenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGerenteRequest $request)
    {
        $gerente = $this->gerenteRepository->find($id);

        if (empty($gerente)) {
            Flash::error('Gerente not found');

            return redirect(route('gerentes.index'));
        }

        $gerente = $this->gerenteRepository->update($request->all(), $id);

        Flash::success('Gerente updated successfully.');

        return redirect(route('gerentes.index'));
    }

    /**
     * Remove the specified Gerente from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $gerente = $this->gerenteRepository->find($id);

        if (empty($gerente)) {
            Flash::error('Gerente not found');

            return redirect(route('gerentes.index'));
        }

        $this->gerenteRepository->delete($id);

        Flash::success('Gerente deleted successfully.');

        return redirect(route('gerentes.index'));
    }

    public function indexGerente()
    {
        //dd("test");
        //dd(Auth::user()->id);
        //$est = Auth::user()->id_proyecto;
        $email = Auth::user()->email;
        //$proyecto = DB::table('OperacionesDet')->where('id_proyecto', '=', $est)->orderBy('fecha', 'desc')->paginate(60);
        //dd($proyecto);
        $totales = "SELECT ge.id, ge.nombre, pr.no_proyecto, pr.nombre, pr.id as id_proyecto, op.id as op_id, op.fecha, op.no_operaciones, op.tickets FROM u548444544_montos1.proyecto pr
                    inner join u548444544_montos1.gerentes ge
                    inner join u548444544_montos1.OperacionesDet op
                    on pr.id_gerentes = ge.id
                    where ge.email = '$email'";
        $result1 = DB::SELECT($totales);
        //dd(Auth::user()->email, $result1);
        return view('home_gerente')->with('consolidados', $result1);
    }

    public function createGerente()
    {
        //dd(Auth::user()->id_proyecto);
        $email = Auth::user()->email;
        $totales = "SELECT ge.id, ge.nombre, pr.no_proyecto, pr.nombre, pr.id as id_proyecto FROM u548444544_montos1.proyecto pr
                    inner join u548444544_montos1.gerentes ge
                    on pr.id_gerentes = ge.id
                    where ge.email = '$email'";
        $result1 = DB::SELECT($totales);
        $conceptops = Concepto::all();
        return view('operacion_dets.gerentesoperacioncreate')->with('consolidados', $result1)->with('conceptops', $conceptops);
    }

    public function storeGerente()
    {
        $input = \request()->all();

        $flight = new OperacionDet();

        $flight->fecha = $input['fecha'];
        $flight->no_operaciones = $input['no_operaciones'];
        $flight->id_proyecto = $input['id_proyecto'];
        $flight->tickets = $input['tickets'];
        $flight->estatus = $input['estatus'];
        $flight->id_concepto = $input['id_concepto'];
        $flight->save();

        Flash::success('Operacion cargada exitosamente.');

        return redirect(route('h_gerente'));

    }

}
