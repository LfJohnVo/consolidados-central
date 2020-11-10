<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOperacionHistoricoRequest;
use App\Http\Requests\UpdateOperacionHistoricoRequest;
use App\Repositories\OperacionHistoricoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OperacionHistoricoController extends AppBaseController
{
    /** @var  OperacionHistoricoRepository */
    private $operacionHistoricoRepository;

    public function __construct(OperacionHistoricoRepository $operacionHistoricoRepo)
    {
        $this->operacionHistoricoRepository = $operacionHistoricoRepo;
    }

    /**
     * Display a listing of the OperacionHistorico.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $operacionHistoricos = $this->operacionHistoricoRepository->all();

        return view('operacion_historicos.index')
            ->with('operacionHistoricos', $operacionHistoricos);
    }

    /**
     * Show the form for creating a new OperacionHistorico.
     *
     * @return Response
     */
    public function create()
    {
        return view('operacion_historicos.create');
    }

    /**
     * Store a newly created OperacionHistorico in storage.
     *
     * @param CreateOperacionHistoricoRequest $request
     *
     * @return Response
     */
    public function store(CreateOperacionHistoricoRequest $request)
    {
        $input = $request->all();

        $operacionHistorico = $this->operacionHistoricoRepository->create($input);

        Flash::success('Operacion Historico saved successfully.');

        return redirect(route('operacionHistoricos.index'));
    }

    /**
     * Display the specified OperacionHistorico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $operacionHistorico = $this->operacionHistoricoRepository->find($id);

        if (empty($operacionHistorico)) {
            Flash::error('Operacion Historico not found');

            return redirect(route('operacionHistoricos.index'));
        }

        return view('operacion_historicos.show')->with('operacionHistorico', $operacionHistorico);
    }

    /**
     * Show the form for editing the specified OperacionHistorico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $operacionHistorico = $this->operacionHistoricoRepository->find($id);

        if (empty($operacionHistorico)) {
            Flash::error('Operacion Historico not found');

            return redirect(route('operacionHistoricos.index'));
        }

        return view('operacion_historicos.edit')->with('operacionHistorico', $operacionHistorico);
    }

    /**
     * Update the specified OperacionHistorico in storage.
     *
     * @param int $id
     * @param UpdateOperacionHistoricoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperacionHistoricoRequest $request)
    {
        $operacionHistorico = $this->operacionHistoricoRepository->find($id);

        if (empty($operacionHistorico)) {
            Flash::error('Operacion Historico not found');

            return redirect(route('operacionHistoricos.index'));
        }

        $operacionHistorico = $this->operacionHistoricoRepository->update($request->all(), $id);

        Flash::success('Operacion Historico updated successfully.');

        return redirect(route('operacionHistoricos.index'));
    }

    /**
     * Remove the specified OperacionHistorico from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $operacionHistorico = $this->operacionHistoricoRepository->find($id);

        if (empty($operacionHistorico)) {
            Flash::error('Operacion Historico not found');

            return redirect(route('operacionHistoricos.index'));
        }

        $this->operacionHistoricoRepository->delete($id);

        Flash::success('Operacion Historico deleted successfully.');

        return redirect(route('operacionHistoricos.index'));
    }
}
