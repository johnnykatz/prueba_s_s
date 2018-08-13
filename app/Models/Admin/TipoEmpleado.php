<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class TipoEmpleado
 * @package App\Models\Admin
 * @version August 13, 2018, 6:10 pm UTC
 *
 * @property string nombre
 * @property string slug
 */
class TipoEmpleado extends Model
{

    public $table = 'tipos_empleados';
    



    public $fillable = [
        'nombre',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function empleados()
    {
        return $this->hasMany('App\Models\Admin\Empleado');
    }

    
}
