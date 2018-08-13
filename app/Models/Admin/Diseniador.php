<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Diseniador
 * @package App\Models\Admin
 * @version August 13, 2018, 6:13 pm UTC
 *
 * @property string tipo
 */
class Diseniador extends Model
{

    public $table = 'diseniadores';


    public $fillable = [
        'tipo',
        'empleado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipo' => 'string',
        'empleado_id'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function empleado()
    {
        return $this->belongsTo('App\Models\Admin\Empleado');
    }

    
}
