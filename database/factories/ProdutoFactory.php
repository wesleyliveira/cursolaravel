<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nome = $this->faker->unique()->sentence;
        
        // Gera a imagem e salva em public/storage/produtos
        $imagemPath = 'produtos/' . $this->faker->image('public/storage/produtos', 400, 400, null, false);
        
        return [
            'nome' => $nome,
            'descricao' => $this->faker->paragraph(),
            'preco' => $this->faker->randomFloat(2, 10, 100), // Preço com 2 casas decimais
            'slug' => Str::slug($nome),
            'imagem' => $imagemPath, // Caminho relativo da imagem
            'id_user' => User::pluck('id')->random(), // Seleciona um ID de usuário aleatório
            'id_categoria' => Categoria::pluck('id')->random(), // Seleciona um ID de categoria aleatório
        ];
    }
}
