<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hardevine\Shoppingcart\Facades\Cart; 
use App\Models\Produto; // ou o caminho correto para a sua classe Product


class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::Content(); 
        return view('site.carrinho', compact('itens'));
    }
    
    public function adicionaCarrinho(Request $request)
    { 
        
        // Obtém o produto com base no ID fornecido
        $produto = Produto::find($request->id); // Certifique-se de que a classe Product esteja importada

        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => abs($request->qty),
            'options' => [
                'image' => 'storage/' . $produto->imagem, // Verifica se $produto não é null
            ]
            
        ]);

        return redirect()->route('site.carrinho'); // Redireciona após adicionar ao carrinho
    }

    public function removeCarrinho(Request $request)
    {
        $rowId = $request->input('id');

        try {
            \Cart::remove($rowId);
            return redirect()->route('site.carrinho')->with('atencao', 'Produto removido do carrinho.');
        } catch (InvalidRowIDException $e) {
            return redirect()->route('site.carrinho')->with('erro', 'Erro: ' . $e->getMessage());
        }
    }
    
    public function atualizaCarrinho(Request $request){
        \Cart::update ($request->id,abs ($request->qty));
        return redirect()->route('site.carrinho')->with('aviso', 'Produto atualizado!');
    }
    
    public function limpaCarrinho(){
        \Cart::destroy();
        return redirect()->route('site.carrinho')->with('vazio', 'O carrinho foi limpo.');
    }
}
