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
        Produto::create([ 
            'nome' => 'Arroz 5kg',
            'descricao' => 'Arroz de qualidade superior, ideal para qualquer receita.',
            'preco' => 19.90,
            'slug' => 'arroz-5kg',
            'imagem' => 'storage/arroz.jpg', // Adicione a URL da imagem
            'id_user' => 4, // ID do usuário que criou o produto
            'id_categoria' => 1 // ID da categoria
        ]);

        Produto::create([ 
            'nome' => 'Feijão Preto 1kg',
            'descricao' => 'Feijão preto, ótimo para fazer uma boa feijoada.',
            'preco' => 8.50,
            'slug' => 'feijao-preto-1kg',
            'imagem' => 'storage/feijao.jpg', // Adicione a URL da imagem
            'id_user' => 4,
            'id_categoria' => 1
        ]);

        Produto::create([ 
            'nome' => 'Açúcar 1kg',
            'descricao' => 'Açúcar refinado, perfeito para suas receitas.',
            'preco' => 4.20,
            'slug' => 'acucar-1kg',
            'imagem' => 'storage/acucar.jpg', // Adicione a URL da imagem
            'id_user' => 4,
            'id_categoria' => 1
        ]);
    }
}
