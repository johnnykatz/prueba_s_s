<?php

use Illuminate\Database\Seeder;

class TipoEmpleadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = \App\Models\Admin\TipoEmpleado::firstOrCreate([
            'id' => 1,
            'nombre' => 'Programador',
            'slug' => 'programador',
        ]);

        $tipo = \App\Models\Admin\TipoEmpleado::firstOrCreate([
            'id' => 2,
            'nombre' => 'Diseñador',
            'slug' => 'diseniador',
        ]);
    }
}
