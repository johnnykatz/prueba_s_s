<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Empresa
 * @package App\Models\Admin
 * @version August 13, 2018, 6:08 pm UTC
 *
 * @property string nombre
 */
class Empresa extends Model
{

    public $table = 'empresas';


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
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
