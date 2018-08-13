<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateEmpleadoRequest;
use App\Http\Requests\Admin\UpdateEmpleadoRequest;
use App\Models\Admin\Diseniador;
use App\Models\Admin\Empresa;
use App\Models\Admin\Programador;
use App\Models\Admin\TipoEmpleado;
use App\Repositories\Admin\EmpleadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EmpleadoController extends AppBaseController
{
    /** @var  EmpleadoRepository */
    private $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepo)
    {
        $this->empleadoRepository = $empleadoRepo;
    }

    /**
     * Display a listing of the Empleado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $result = $this->empleadoRepository->getEmpleadosFilter($request);
        $empleados = $result['datos'];
        $promedio = round($result['promedio']);
        $empresas = Empresa::pluck('nombre', 'id');

        return view('admin.empleados.index')->with([
            'promedio' => $promedio,
            'empleados' => $empleados,
            'empresas' => $empresas
        ]);
    }

    /**
     * Show the form for creating a new Empleado.
     *
     * @return Response
     */
    public function create()
    {
        $empresas = Empresa::pluck('nombre', 'id');
        $tiposEmpleados = TipoEmpleado::pluck('nombre', 'id');
        $lenguajes = array("PHP" => "PHP", "NET" => "NET", "PYTHON" => "PYTHON");
        $tiposDiseniadores = array("GRAFICO" => "GRAFICO", "WEB" => "WEB");
        return view('admin.empleados.create')->with([
            'lenguajes' => $lenguajes,
            'tiposDiseniadores' => $tiposDiseniadores,
            'empresas' => $empresas,
            'tiposEmpleados' => $tiposEmpleados
        ]);
    }

    /**
     * Store a newly created Empleado in storage.
     *
     * @param CreateEmpleadoRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpleadoRequest $request)
    {
        $input = $request->all();

        $empleado = $this->empleadoRepository->create($input);

        if ($input['tipo_empleado_id'] == 1) {
            $programador = new Programador();
            $programador->empleado_id = $empleado->id;
            $programador->lenguaje = $input['lenguaje'];
            $programador->save();
        } else {
            $diseniador = new Diseniador();
            $diseniador->empleado_id = $empleado->id;
            $diseniador->tipo = $input['tipo'];
            $diseniador->save();
        }

        Flash::success('Empleado registrado.');

        return redirect(route('admin.empleados.index'));
    }

    /**
     * Display the specified Empleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('admin.empleados.index'));
        }

        return view('admin.empleados.show')->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified Empleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('admin.empleados.index'));
        }
        $empresas = Empresa::pluck('nombre', 'id');
        $tiposEmpleados = TipoEmpleado::pluck('nombre', 'id');
        $lenguajes = array("PHP" => "PHP", "NET" => "NET", "PYTHON" => "PYTHON");
        $tiposDiseniadores = array("GRAFICO" => "GRAFICO", "WEB" => "WEB");

        return view('admin.empleados.edit')->with([
            'lenguajes' => $lenguajes,
            'tiposDiseniadores' => $tiposDiseniadores,
            'empresas' => $empresas,
            'tiposEmpleados' => $tiposEmpleados,
            'empleado' => $empleado]);
    }

    /**
     * Update the specified Empleado in storage.
     *
     * @param  int $id
     * @param UpdateEmpleadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpleadoRequest $request)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('admin.empleados.index'));
        }

        $empleado = $this->empleadoRepository->update($request->all(), $id);

        if ($request['tipo_empleado_id'] == 1) {
            $programador = (isset($empleado->programador)) ? $empleado->programador : new Programador();
            $programador->empleado_id = $empleado->id;
            $programador->lenguaje = $request['lenguaje'];
            $programador->save();
            if (isset($empleado->diseniador))
                $empleado->diseniador->delete();
        } else {
            $diseniador = (isset($empleado->diseniador)) ? $empleado->diseniador : new Diseniador();
            $diseniador->empleado_id = $empleado->id;
            $diseniador->tipo = $request['tipo'];
            $diseniador->save();
            if (isset($empleado->programador))
                $empleado->programador->delete();
        }

        Flash::success('Empleado actualizado.');

        return redirect(route('admin.empleados.index'));
    }

    /**
     * Remove the specified Empleado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('admin.empleados.index'));
        }

        if (isset($empleado->programador))
            $empleado->programador->delete();

        if (isset($empleado->diseniador))
            $empleado->diseniador->delete();

        $this->empleadoRepository->delete($id);

        Flash::success('Empleado eliminado.');

        return redirect(route('admin.empleados.index'));
    }
}
