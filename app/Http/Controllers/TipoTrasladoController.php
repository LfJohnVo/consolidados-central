<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoTrasladoRequest;
use App\Http\Requests\UpdateTipoTrasladoRequest;
use App\Repositories\TipoTrasladoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipoTrasladoController extends AppBaseController
{
    /** @var  TipoTrasladoRepository */
    private $tipoTrasladoRepository;

    public function __construct(TipoTrasladoRepository $tipoTrasladoRepo)
    {
        $this->tipoTrasladoRepository = $tipoTrasladoRepo;
    }

    /**
     * Display a listing of the TipoTraslado.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoTraslados = $this->tipoTrasladoRepository->all();

        return view('tipo_traslados.index')
            ->with('tipoTraslados', $tipoTraslados);
    }

    /**
     * Show the form for creating a new TipoTraslado.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_traslados.create');
    }

    /**
     * Store a newly created TipoTraslado in storage.
     *
     * @param CreateTipoTrasladoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoTrasladoRequest $request)
    {
        $input = $request->all();

        $tipoTraslado = $this->tipoTrasladoRepository->create($input);

        Flash::success('Tipo Traslado saved successfully.');

        return redirect(route('tipoTraslados.index'));
    }

    /**
     * Display the specified TipoTraslado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoTraslado = $this->tipoTrasladoRepository->find($id);

        if (empty($tipoTraslado)) {
            Flash::error('Tipo Traslado not found');

            return redirect(route('tipoTraslados.index'));
        }

        return view('tipo_traslados.show')->with('tipoTraslado', $tipoTraslado);
    }

    /**
     * Show the form for editing the specified TipoTraslado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoTraslado = $this->tipoTrasladoRepository->find($id);

        if (empty($tipoTraslado)) {
            Flash::error('Tipo Traslado not found');

            return redirect(route('tipoTraslados.index'));
        }

        return view('tipo_traslados.edit')->with('tipoTraslado', $tipoTraslado);
    }

    /**
     * Update the specified TipoTraslado in storage.
     *
     * @param int $id
     * @param UpdateTipoTrasladoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoTrasladoRequest $request)
    {
        $tipoTraslado = $this->tipoTrasladoRepository->find($id);

        if (empty($tipoTraslado)) {
            Flash::error('Tipo Traslado not found');

            return redirect(route('tipoTraslados.index'));
        }

        $tipoTraslado = $this->tipoTrasladoRepository->update($request->all(), $id);

        Flash::success('Tipo Traslado updated successfully.');

        return redirect(route('tipoTraslados.index'));
    }

    /**
     * Remove the specified TipoTraslado from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoTraslado = $this->tipoTrasladoRepository->find($id);

        if (empty($tipoTraslado)) {
            Flash::error('Tipo Traslado not found');

            return redirect(route('tipoTraslados.index'));
        }

        $this->tipoTrasladoRepository->delete($id);

        Flash::success('Tipo Traslado deleted successfully.');

        return redirect(route('tipoTraslados.index'));
    }
}
