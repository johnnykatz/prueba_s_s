<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Programador;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProgramadorRepository
 * @package App\Repositories\Admin
 * @version August 13, 2018, 6:13 pm UTC
 *
 * @method Programador findWithoutFail($id, $columns = ['*'])
 * @method Programador find($id, $columns = ['*'])
 * @method Programador first($columns = ['*'])
*/
class ProgramadorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lenguaje'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Programador::class;
    }
}
