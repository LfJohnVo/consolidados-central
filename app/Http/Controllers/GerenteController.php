<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGerenteRequest;
use App\Http\Requests\UpdateGerenteRequest;
use App\Models\OperacionDet;
use App\Repositories\GerenteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\DB;

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
        //$gerentes = $this->gerenteRepository->all();
        $gerentes = DB::table('gerentes')
            ->join('proyecto', 'proyecto.id', '=', 'gerentes.id_proyecto')
            ->select('gerentes.*', 'proyecto.nombre as ProyectoNombre')
            ->paginate(50);

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
        $proyectos = DB::table('proyecto')->select('id', 'nombre')->get();

        return view('gerentes.create')->with('proyectos', $proyectos);
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

        //dd($input);

        $input['password'] = Hash::make($input['password']);
        $gerente = $this->gerenteRepository->create($input);

        //$gerente = $this->gerenteRepository->create($input);

        Flash::success('Gerente añadido satisfactoriamente.');

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
        //$gerente = $this->gerenteRepository->find($id);
        $gerente = DB::table('gerentes')
            ->join('proyecto', 'gerentes.id_proyecto', '=', 'proyecto.id')
            ->select('proyecto.nombre', 'gerentes.id', 'gerentes.nombre', 'gerentes.email', 'gerentes.password')
            ->where('gerentes.id', '=', $id)
            ->get();
        //dd($gerente);
        $proyectos = DB::table('proyecto')->select('id', 'nombre')->get();
        //dd($proyectos);

        if (empty($gerente)) {
            Flash::error('Gerente not found');

            return redirect(route('gerentes.index'));
        }

        return view('gerentes.edit')->with('gerentes', $gerente)
            ->with('proyectos', $proyectos);
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
        //$gerente = $this->gerenteRepository->find($id);
        //dd(request()->all());
        $input = \request()->validate([
            'id_proyecto' => 'integer',
            'nombre' => 'string',
            'email' => 'email',
            'password' => '',
        ]);

        $gerente = DB::table('gerentes')->select('id', 'nombre', 'email', 'password', 'id_proyecto')->where('id', '=', $id)->get();
        //dd($gerente);

        if (empty($gerente)) {
            Flash::error('Gerente not found');

            return redirect(route('gerentes.index'));
        }

        if ($input['id_proyecto'] != null) {
            $up = DB::table('gerentes')
                ->where('id', '=', $id)
                ->update(['id_proyecto' => $input['id_proyecto']]);
        }
        if ($input['nombre'] != null) {
            $up = DB::table('gerentes')
                ->where('id', '=', $id)
                ->update(['nombre' => $input['nombre']]);
        }
        if ($input['email'] != null) {
            $up = DB::table('gerentes')
                ->where('id', '=', $id)
                ->update(['email' => $input['email']]);
        }
        if ($input['password'] != null) {
            $up = DB::table('gerentes')
                ->where('id', '=', $id)
                ->update(['password' => Hash::make($input['password'])]);
        }

        //$gerente = $this->gerenteRepository->update($request->all(), $id);

        Flash::success('Gerente actualizado satisfactoriamente.');

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
        $gerente = DB::table('gerentes')
            ->where('id','=', $id)
            ->first();
        //dd($gerente);
        //$gerente = $this->gerenteRepository->find($id);

        if (empty($gerente)) {
            Flash::error('Gerente not found');

            return redirect(route('gerentes.index'));
        }

        $sql = DB::table('gerentes')->where('id','=', $id)->delete();
        //$this->gerenteRepository->delete($id);

        Flash::success('Gerente eliminado.');

        return redirect(route('gerentes.index'));
    }

    public function indexGerente()
    {
        //dd(Auth::user()->id_proyecto);
        $est = Auth::user()->id_proyecto;
        $proyecto = DB::table('OperacionesDet')->where('id_proyecto', '=', $est)->orderBy('fecha', 'desc')->paginate(60);
        //dd($proyecto);
        return view('home_gerente')->with('proyectos', $proyecto);
    }

    public function createGerente()
    {
        //dd(Auth::user()->id_proyecto);
        $est = Auth::user()->id_proyecto;
        //dd($proyecto);
        return view('operacion_dets.gerentesoperacioncreate')->with('ests', $est);
    }

    public function storeGerente()
    {
        $input = \request()->all();
        //dd($input);

        $flight = new OperacionDet();

        $flight->fecha = $input['fecha'];
        $flight->no_operaciones = $input['no_operaciones'];
        $flight->id_proyecto = $input['id_proyecto'];
        $flight->tickets = $input['tickets'];
        $flight->estatus = $input['estatus'];
        $flight->save();

        Flash::success('Operacion cargada exitosamente.');

        return redirect(route('h_gerente'));

    }
}
