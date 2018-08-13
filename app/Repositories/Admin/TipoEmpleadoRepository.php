<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TipoEmpleado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoEmpleadoRepository
 * @package App\Repositories\Admin
 * @version August 13, 2018, 6:10 pm UTC
 *
 * @method TipoEmpleado findWithoutFail($id, $columns = ['*'])
 * @method TipoEmpleado find($id, $columns = ['*'])
 * @method TipoEmpleado first($columns = ['*'])
*/
class TipoEmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoEmpleado::class;
    }
}
