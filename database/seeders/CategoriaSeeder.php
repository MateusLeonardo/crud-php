<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nome' => 'Eletrônicos']);
        Categoria::create(['nome' => 'Eletrodomésticos']);
        Categoria::create(['nome' => 'Móveis']);
        Categoria::create(['nome' => 'Vestuário']);
        Categoria::create(['nome' => 'Brinquedos']);
    }
}
