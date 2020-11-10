<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePromesaRequest;
use App\Http\Requests\UpdatePromesaRequest;
use App\Repositories\PromesaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PromesaController extends AppBaseController
{
    /** @var  PromesaRepository */
    private $promesaRepository;

    public function __construct(PromesaRepository $promesaRepo)
    {
        $this->promesaRepository = $promesaRepo;
    }

    /**
     * Display a listing of the Promesa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $promesas = $this->promesaRepository->all();

        return view('promesas.index')
            ->with('promesas', $promesas);
    }

    /**
     * Show the form for creating a new Promesa.
     *
     * @return Response
     */
    public function create()
    {
        return view('promesas.create');
    }

    /**
     * Store a newly created Promesa in storage.
     *
     * @param CreatePromesaRequest $request
     *
     * @return Response
     */
    public function store(CreatePromesaRequest $request)
    {
        $input = $request->all();

        $promesa = $this->promesaRepository->create($input);

        Flash::success('Promesa saved successfully.');

        return redirect(route('promesas.index'));
    }

    /**
     * Display the specified Promesa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $promesa = $this->promesaRepository->find($id);

        if (empty($promesa)) {
            Flash::error('Promesa not found');

            return redirect(route('promesas.index'));
        }

        return view('promesas.show')->with('promesa', $promesa);
    }

    /**
     * Show the form for editing the specified Promesa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $promesa = $this->promesaRepository->find($id);

        if (empty($promesa)) {
            Flash::error('Promesa not found');

            return redirect(route('promesas.index'));
        }

        return view('promesas.edit')->with('promesa', $promesa);
    }

    /**
     * Update the specified Promesa in storage.
     *
     * @param int $id
     * @param UpdatePromesaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePromesaRequest $request)
    {
        $promesa = $this->promesaRepository->find($id);

        if (empty($promesa)) {
            Flash::error('Promesa not found');

            return redirect(route('promesas.index'));
        }

        $promesa = $this->promesaRepository->update($request->all(), $id);

        Flash::success('Promesa updated successfully.');

        return redirect(route('promesas.index'));
    }

    /**
     * Remove the specified Promesa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $promesa = $this->promesaRepository->find($id);

        if (empty($promesa)) {
            Flash::error('Promesa not found');

            return redirect(route('promesas.index'));
        }

        $this->promesaRepository->delete($id);

        Flash::success('Promesa deleted successfully.');

        return redirect(route('promesas.index'));
    }
}
