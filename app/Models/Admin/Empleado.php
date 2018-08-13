<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Empleado
 * @package App\Models\Admin
 * @version August 13, 2018, 6:12 pm UTC
 *
 * @property string apellido
 * @property string nombre
 * @property integer edad
 */
class Empleado extends Model
{

    public $table = 'empleados';


    public $fillable = [
        'apellido',
        'nombre',
        'edad',
        'empresa_id',
        'tipo_empleado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'apellido' => 'string',
        'nombre' => 'string',
        'edad' => 'integer',
        'empresa_id' => 'integer',
        'tipo_empleado_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function diseniador()
    {
        return $this->hasOne('App\Models\Admin\Diseniador');
    }

    public function programador()
    {
        return $this->hasOne('App\Models\Admin\Programador');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Models\Admin\Empresa');
    }

    public function tipoEmpleado()
    {
        return $this->belongsTo('App\Models\Admin\TipoEmpleado');
    }
}
