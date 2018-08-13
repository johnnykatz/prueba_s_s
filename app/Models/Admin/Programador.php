<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Programador
 * @package App\Models\Admin
 * @version August 13, 2018, 6:13 pm UTC
 *
 * @property string lenguaje
 */
class Programador extends Model
{

    public $table = 'programadores';
    



    public $fillable = [
        'lenguaje',
        'empleado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'lenguaje' => 'string',
        'empleado_id' => 'integer'
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
