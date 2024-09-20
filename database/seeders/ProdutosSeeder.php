<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
Use App\Models\Produto;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() 
    {
        Produto::factory(20)->create();
    }
}
