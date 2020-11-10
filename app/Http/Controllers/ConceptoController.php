<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConceptoRequest;
use App\Http\Requests\UpdateConceptoRequest;
use App\Repositories\ConceptoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConceptoController extends AppBaseController
{
    /** @var  ConceptoRepository */
    private $conceptoRepository;

    public function __construct(ConceptoRepository $conceptoRepo)
    {
        $this->conceptoRepository = $conceptoRepo;
    }

    /**
     * Display a listing of the Concepto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $conceptos = $this->conceptoRepository->all();

        return view('conceptos.index')
            ->with('conceptos', $conceptos);
    }

    /**
     * Show the form for creating a new Concepto.
     *
     * @return Response
     */
    public function create()
    {
        return view('conceptos.create');
    }

    /**
     * Store a newly created Concepto in storage.
     *
     * @param CreateConceptoRequest $request
     *
     * @return Response
     */
    public function store(CreateConceptoRequest $request)
    {
        $input = $request->all();

        $concepto = $this->conceptoRepository->create($input);

        Flash::success('Concepto saved successfully.');

        return redirect(route('conceptos.index'));
    }

    /**
     * Display the specified Concepto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concepto = $this->conceptoRepository->find($id);

        if (empty($concepto)) {
            Flash::error('Concepto not found');

            return redirect(route('conceptos.index'));
        }

        return view('conceptos.show')->with('concepto', $concepto);
    }

    /**
     * Show the form for editing the specified Concepto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $concepto = $this->conceptoRepository->find($id);

        if (empty($concepto)) {
            Flash::error('Concepto not found');

            return redirect(route('conceptos.index'));
        }

        return view('conceptos.edit')->with('concepto', $concepto);
    }

    /**
     * Update the specified Concepto in storage.
     *
     * @param int $id
     * @param UpdateConceptoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConceptoRequest $request)
    {
        $concepto = $this->conceptoRepository->find($id);

        if (empty($concepto)) {
            Flash::error('Concepto not found');

            return redirect(route('conceptos.index'));
        }

        $concepto = $this->conceptoRepository->update($request->all(), $id);

        Flash::success('Concepto updated successfully.');

        return redirect(route('conceptos.index'));
    }

    /**
     * Remove the specified Concepto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concepto = $this->conceptoRepository->find($id);

        if (empty($concepto)) {
            Flash::error('Concepto not found');

            return redirect(route('conceptos.index'));
        }

        $this->conceptoRepository->delete($id);

        Flash::success('Concepto deleted successfully.');

        return redirect(route('conceptos.index'));
    }
}
