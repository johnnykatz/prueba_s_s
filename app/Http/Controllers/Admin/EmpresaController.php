<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateEmpresaRequest;
use App\Http\Requests\Admin\UpdateEmpresaRequest;
use App\Repositories\Admin\EmpresaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EmpresaController extends AppBaseController
{
    /** @var  EmpresaRepository */
    private $empresaRepository;

    public function __construct(EmpresaRepository $empresaRepo)
    {
        $this->empresaRepository = $empresaRepo;
    }

    /**
     * Display a listing of the Empresa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empresaRepository->pushCriteria(new RequestCriteria($request));
        $empresas = $this->empresaRepository->all();

        return view('admin.empresas.index')
            ->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new Empresa.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.empresas.create');
    }

    /**
     * Store a newly created Empresa in storage.
     *
     * @param CreateEmpresaRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpresaRequest $request)
    {
        $input = $request->all();

        $empresa = $this->empresaRepository->create($input);

        Flash::success('Empresa guardada.');

        return redirect(route('admin.empresas.index'));
    }

    /**
     * Display the specified Empresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('admin.empresas.index'));
        }

        return view('admin.empresas.show')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified Empresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('admin.empresas.index'));
        }

        return view('admin.empresas.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified Empresa in storage.
     *
     * @param  int $id
     * @param UpdateEmpresaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpresaRequest $request)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('admin.empresas.index'));
        }

        $empresa = $this->empresaRepository->update($request->all(), $id);

        Flash::success('Empresa actualizada.');

        return redirect(route('admin.empresas.index'));
    }

    /**
     * Remove the specified Empresa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('Empresa not found');

            return redirect(route('admin.empresas.index'));
        }
        try {
            $this->empresaRepository->delete($id);
        } catch (\Exception $e) {
            Flash::error('La empresa no puede ser eliminada.');
            return redirect(route('admin.empresas.index'));
        }

        Flash::success('La empresa fue eliminada.');

        return redirect(route('admin.empresas.index'));
    }
}
