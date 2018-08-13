<?php

use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa= \App\Models\Admin\Empresa::firstOrCreate([
            'nombre' => 'Summa Solutions'
        ]);
    }
}
