<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Diseniador;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DiseniadorRepository
 * @package App\Repositories\Admin
 * @version August 13, 2018, 6:13 pm UTC
 *
 * @method Diseniador findWithoutFail($id, $columns = ['*'])
 * @method Diseniador find($id, $columns = ['*'])
 * @method Diseniador first($columns = ['*'])
*/
class DiseniadorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Diseniador::class;
    }
}
