<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hardevine\Shoppingcart\Facades\Cart; 

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::Content(); 
        return view('site.carrinho', compact('itens'));
    }
    
    public function adicionaCarrinho(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'attributes' => [
                'image' => $request->img,
            ]
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');
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
        \Cart::update($request->id, $request->qty);
        return redirect()->route('site.carrinho')->with('aviso', 'Produto atualizado!');
    }
    
    public function limpaCarrinho(){
        \Cart::destroy();
        return redirect()->route('site.carrinho')->with('vazio', 'O carrinho foi limpo.');
    }
}
