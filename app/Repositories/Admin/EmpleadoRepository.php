<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Empleado;
use Illuminate\Support\Facades\DB;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmpleadoRepository
 * @package App\Repositories\Admin
 * @version August 13, 2018, 6:12 pm UTC
 *
 * @method Empleado findWithoutFail($id, $columns = ['*'])
 * @method Empleado find($id, $columns = ['*'])
 * @method Empleado first($columns = ['*'])
 */
class EmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'apellido',
        'nombre',
        'edad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Empleado::class;
    }

    public function getEmpleadosFilter($request)
    {
        $empleados = Empleado::orderBy('apellido', 'ASC');
        if ($request['empresa_id'] != "") {
            $empleados->where('empresa_id', $request['empresa_id']);
        }
        if ($request['id'] != "") {
            $empleados->where('id', $request['id']);
        }
        $result['datos'] = $empleados->get();
        $result['promedio'] = $empleados->avg('edad');
        return $result;

    }
}
