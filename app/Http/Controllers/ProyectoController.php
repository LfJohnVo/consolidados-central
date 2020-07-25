<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Repositories\ProyectoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class ProyectoController extends AppBaseController
{
    /** @var  ProyectoRepository */
    private $proyectoRepository;

    public function __construct(ProyectoRepository $proyectoRepo)
    {
        $this->proyectoRepository = $proyectoRepo;
    }

    /**
     * Display a listing of the Proyecto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$proyectos = $this->proyectoRepository->all();
        $proyectos = DB::table('proyecto')
            ->join('regiones', 'proyecto.id_region', '=', 'regiones.id')
            ->join('cat_grupos', 'proyecto.id_grupo', '=', 'cat_grupos.id_grupos')
            ->select('proyecto.id','proyecto.no_proyecto', 'proyecto.Nombre' , 'regiones.nombre as regionnombre', 'cat_grupos.grupo as gruponombre')
            ->paginate(50);

        //dd($proyectos);

        return view('proyectos.index')
            ->with('proyectos', $proyectos);
    }

    /**
     * Show the form for creating a new Proyecto.
     *
     * @return Response
     */
    public function create()
    {
        $region = DB::table('regiones')->select('id', 'nombre', 'identificador')->get();
        $grupo = DB::table('cat_grupos')->select('id_grupos', 'grupo')->get();
        return view('proyectos.create')->with('regiones', $region)->with('grupos', $grupo);
    }

    /**
     * Store a newly created Proyecto in storage.
     *
     * @param CreateProyectoRequest $request
     *
     * @return Response
     */
    public function store(CreateProyectoRequest $request)
    {
        $input = $request->all();

        $proyecto = $this->proyectoRepository->create($input);

        Flash::success('Proyecto añadido exitosamente.');

        return redirect(route('proyectos.index'));
    }

    /**
     * Display the specified Proyecto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyecto = $this->proyectoRepository->find($id);

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        return view('proyectos.show')->with('proyecto', $proyecto);
    }

    /**
     * Show the form for editing the specified Proyecto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyecto = $this->proyectoRepository->find($id);
        //dd($proyecto);
        $region = DB::table('regiones')->select('id', 'nombre', 'identificador')->get();
        $grupo = DB::table('cat_grupos')->select('id_grupos', 'grupo')->get();


        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        return view('proyectos.edit')->with('proyecto', $proyecto)->with('regiones', $region)->with('grupos', $grupo);
    }

    /**
     * Update the specified Proyecto in storage.
     *
     * @param int $id
     * @param UpdateProyectoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProyectoRequest $request)
    {
        $proyecto = $this->proyectoRepository->find($id);

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        $proyecto = $this->proyectoRepository->update($request->all(), $id);

        Flash::success('Proyecto actualizado correctamente.');

        return redirect(route('proyectos.index'));
    }

    /**
     * Remove the specified Proyecto from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $proyecto = $this->proyectoRepository->find($id);

        if (empty($proyecto)) {
            Flash::error('Proyecto not found');

            return redirect(route('proyectos.index'));
        }

        $this->proyectoRepository->delete($id);

        Flash::success('Proyecto eliminado satisfactoriamente.');

        return redirect(route('proyectos.index'));
    }
}
