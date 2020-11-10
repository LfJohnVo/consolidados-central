<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistritalRequest;
use App\Http\Requests\UpdateDistritalRequest;
use App\Models\Region;
use App\Repositories\DistritalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DistritalController extends AppBaseController
{
    /** @var  DistritalRepository */
    private $distritalRepository;

    public function __construct(DistritalRepository $distritalRepo)
    {
        $this->distritalRepository = $distritalRepo;
    }

    /**
     * Display a listing of the Distrital.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $distritals = $this->distritalRepository->all();

        return view('distritals.index')
            ->with('distritals', $distritals);
    }

    /**
     * Show the form for creating a new Distrital.
     *
     * @return Response
     */
    public function create()
    {
        $regionales = Region::all();
        return view('distritals.create')->with('regionales', $regionales);
    }

    /**
     * Store a newly created Distrital in storage.
     *
     * @param CreateDistritalRequest $request
     *
     * @return Response
     */
    public function store(CreateDistritalRequest $request)
    {
        $input = $request->all();

        $distrital = $this->distritalRepository->create($input);

        Flash::success('Distrital saved successfully.');

        return redirect(route('distritals.index'));
    }

    /**
     * Display the specified Distrital.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distrital = $this->distritalRepository->find($id);

        if (empty($distrital)) {
            Flash::error('Distrital not found');

            return redirect(route('distritals.index'));
        }

        return view('distritals.show')->with('distrital', $distrital);
    }

    /**
     * Show the form for editing the specified Distrital.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distrital = $this->distritalRepository->find($id);

        if (empty($distrital)) {
            Flash::error('Distrital not found');

            return redirect(route('distritals.index'));
        }

        $regionales = Region::all();
        return view('distritals.edit')->with('distrital', $distrital)->with('regionales', $regionales);
    }

    /**
     * Update the specified Distrital in storage.
     *
     * @param int $id
     * @param UpdateDistritalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistritalRequest $request)
    {
        $distrital = $this->distritalRepository->find($id);

        if (empty($distrital)) {
            Flash::error('Distrital not found');

            return redirect(route('distritals.index'));
        }

        $distrital = $this->distritalRepository->update($request->all(), $id);

        Flash::success('Distrital updated successfully.');

        return redirect(route('distritals.index'));
    }

    /**
     * Remove the specified Distrital from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distrital = $this->distritalRepository->find($id);

        if (empty($distrital)) {
            Flash::error('Distrital not found');

            return redirect(route('distritals.index'));
        }

        $this->distritalRepository->delete($id);

        Flash::success('Distrital deleted successfully.');

        return redirect(route('distritals.index'));
    }
}
