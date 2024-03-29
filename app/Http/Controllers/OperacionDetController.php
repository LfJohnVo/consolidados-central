<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOperacionDetRequest;
use App\Http\Requests\UpdateOperacionDetRequest;
use App\Models\Concepto;
use App\Models\OperacionDet;
use App\Repositories\OperacionDetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class OperacionDetController extends AppBaseController
{
    /** @var  OperacionDetRepository */
    private $operacionDetRepository;

    public function __construct(OperacionDetRepository $operacionDetRepo)
    {
        $this->operacionDetRepository = $operacionDetRepo;
    }

    /**
     * Display a listing of the OperacionDet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$operacionDets = $this->operacionDetRepository->orderBy('created_at', 'desc')->all();
        $operacionDet = OperacionDet::orderBy('created_at', 'desc')->get();

        return view('operacion_dets.index')
            ->with('operacionDets', $operacionDet);
    }

    /**
     * Show the form for creating a new OperacionDet.
     *
     * @return Response
     */
    public function create()
    {
        $conceptops = Concepto::all();
        $proyecto = DB::table('proyecto')->select('id', 'no_proyecto', 'Nombre')->get();
        return view('operacion_dets.create')->with('proyectos', $proyecto)->with('conceptops', $conceptops);
    }

    /**
     * Store a newly created OperacionDet in storage.
     *
     * @param CreateOperacionDetRequest $request
     *
     * @return Response
     */
    public function store(CreateOperacionDetRequest $request)
    {
        $input = $request->all();

        $operacionDet = $this->operacionDetRepository->create($input);

        Flash::success('Operacion cargada exitosamente.');

        return redirect(route('operacionDets.index'));
    }

    /**
     * Display the specified OperacionDet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $operacionDet = $this->operacionDetRepository->find($id);

        if (empty($operacionDet)) {
            Flash::error('Operacion Det not found');

            return redirect(route('operacionDets.index'));
        }

        return view('operacion_dets.show')->with('operacionDet', $operacionDet);
    }

    /**
     * Show the form for editing the specified OperacionDet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $operacionDet = $this->operacionDetRepository->find($id);
        $proyecto = DB::table('proyecto')->select('id', 'no_proyecto', 'Nombre')->get();
        $conceptops = Concepto::all();


        if (empty($operacionDet)) {
            Flash::error('Operacion Det not found');

            return redirect(route('operacionDets.index'));
        }

        return view('operacion_dets.edit')->with('operacionDet', $operacionDet)->with('proyectos', $proyecto)->with('conceptops', $conceptops);
    }

    /**
     * Update the specified OperacionDet in storage.
     *
     * @param int $id
     * @param UpdateOperacionDetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperacionDetRequest $request)
    {
        $operacionDet = $this->operacionDetRepository->find($id);

        if (empty($operacionDet)) {
            Flash::error('Operacion Det not found');

            return redirect(route('operacionDets.index'));
        }

        $operacionDet = $this->operacionDetRepository->update($request->all(), $id);

        Flash::success('Operacion actualizada correctamente.');

        return redirect(route('operacionDets.index'));
    }

    /**
     * Remove the specified OperacionDet from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $operacionDet = $this->operacionDetRepository->find($id);

        if (empty($operacionDet)) {
            Flash::error('Operacion Det not found');

            return redirect(route('operacionDets.index'));
        }

        $this->operacionDetRepository->delete($id);

        Flash::success('Operacion eliminada exitosamente.');

        return redirect(route('operacionDets.index'));
    }
}
