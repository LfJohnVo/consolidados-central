<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOperacionRequest;
use App\Http\Requests\UpdateOperacionRequest;
use App\Repositories\OperacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;
use App\Models\Operacion;

class OperacionController extends AppBaseController
{
    /** @var  OperacionRepository */
    private $operacionRepository;

    public function __construct(OperacionRepository $operacionRepo)
    {
        $this->operacionRepository = $operacionRepo;
    }

    /**
     * Display a listing of the Operacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$operacions = $this->operacionRepository->all();
        /*$operacions = Operacion::join('proyecto', 'proyecto.id','=','operaciones.id_proyecto')->select('operaciones*', 'proyecto.nombre')->
        paginate(31);*/
        $operacions = DB::table('operaciones')
            ->join('proyecto', 'operaciones.id_proyecto', '=', 'proyecto.id')
            ->select('proyecto.id as proyectoid', 'proyecto.nombre as proyectonombre' , 'operaciones.*')
            ->orderByDesc('created_at')
            ->paginate(31);

        //dd($operacions);

        return view('operacions.index')
            ->with('operacions', $operacions);
    }

    /**
     * Show the form for creating a new Operacion.
     *
     * @return Response
     */
    public function create()
    {
        $proyectos = DB::table('proyecto')->select('id', 'nombre')->get();

        return view('operacions.create')->with('proyectos', $proyectos);
    }

    /**
     * Store a newly created Operacion in storage.
     *
     * @param CreateOperacionRequest $request
     *
     * @return Response
     */
    public function store(CreateOperacionRequest $request)
    {
        //$input = $request->all();
        $input = \request()->all();
        dd($input);

        $operacion = $this->operacionRepository->create($input);

        Flash::success('Operacion saved successfully.');

        return redirect(route('operacions.index'));
    }

    /**
     * Display the specified Operacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $operacion = $this->operacionRepository->find($id);

        if (empty($operacion)) {
            Flash::error('Operacion not found');

            return redirect(route('operacions.index'));
        }

        return view('operacions.show')->with('operacion', $operacion);
    }

    /**
     * Show the form for editing the specified Operacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $operacion = $this->operacionRepository->find($id);

        if (empty($operacion)) {
            Flash::error('Operacion not found');

            return redirect(route('operacions.index'));
        }

        return view('operacions.edit')->with('operacion', $operacion);
    }

    /**
     * Update the specified Operacion in storage.
     *
     * @param int $id
     * @param UpdateOperacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperacionRequest $request)
    {
        $operacion = $this->operacionRepository->find($id);

        if (empty($operacion)) {
            Flash::error('Operacion not found');

            return redirect(route('operacions.index'));
        }

        $operacion = $this->operacionRepository->update($request->all(), $id);

        Flash::success('Operacion updated successfully.');

        return redirect(route('operacions.index'));
    }

    /**
     * Remove the specified Operacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $operacion = $this->operacionRepository->find($id);

        if (empty($operacion)) {
            Flash::error('Operacion not found');

            return redirect(route('operacions.index'));
        }

        $this->operacionRepository->delete($id);

        Flash::success('Operacion deleted successfully.');

        return redirect(route('operacions.index'));
    }
}
