<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBancoRequest;
use App\Http\Requests\UpdateBancoRequest;
use App\Repositories\BancoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BancoController extends AppBaseController
{
    /** @var  BancoRepository */
    private $bancoRepository;

    public function __construct(BancoRepository $bancoRepo)
    {
        $this->bancoRepository = $bancoRepo;
    }

    /**
     * Display a listing of the Banco.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bancos = $this->bancoRepository->all();

        return view('bancos.index')
            ->with('bancos', $bancos);
    }

    /**
     * Show the form for creating a new Banco.
     *
     * @return Response
     */
    public function create()
    {
        return view('bancos.create');
    }

    /**
     * Store a newly created Banco in storage.
     *
     * @param CreateBancoRequest $request
     *
     * @return Response
     */
    public function store(CreateBancoRequest $request)
    {
        $input = $request->all();

        $banco = $this->bancoRepository->create($input);

        Flash::success('Banco saved successfully.');

        return redirect(route('bancos.index'));
    }

    /**
     * Display the specified Banco.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $banco = $this->bancoRepository->find($id);

        if (empty($banco)) {
            Flash::error('Banco not found');

            return redirect(route('bancos.index'));
        }

        return view('bancos.show')->with('banco', $banco);
    }

    /**
     * Show the form for editing the specified Banco.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $banco = $this->bancoRepository->find($id);

        if (empty($banco)) {
            Flash::error('Banco not found');

            return redirect(route('bancos.index'));
        }

        return view('bancos.edit')->with('banco', $banco);
    }

    /**
     * Update the specified Banco in storage.
     *
     * @param int $id
     * @param UpdateBancoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBancoRequest $request)
    {
        $banco = $this->bancoRepository->find($id);

        if (empty($banco)) {
            Flash::error('Banco not found');

            return redirect(route('bancos.index'));
        }

        $banco = $this->bancoRepository->update($request->all(), $id);

        Flash::success('Banco updated successfully.');

        return redirect(route('bancos.index'));
    }

    /**
     * Remove the specified Banco from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $banco = $this->bancoRepository->find($id);

        if (empty($banco)) {
            Flash::error('Banco not found');

            return redirect(route('bancos.index'));
        }

        $this->bancoRepository->delete($id);

        Flash::success('Banco deleted successfully.');

        return redirect(route('bancos.index'));
    }
}
