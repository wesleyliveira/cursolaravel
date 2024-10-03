<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class SiteController extends Controller
{
    public function index()
    {
    // Exclui o produto com ID 31 da exibição na página inicial
    $produtos = Produto::where('id', '!=', 31)->paginate(3);

    return view('site.home', compact('produtos'));
    }   

    public function details($slug){
        $produto=Produto::where('slug',$slug)->first();
        return view('site.details',compact('produto'));
    }
    public function categoria($id)
    {
    $categoria = Categoria::find($id);
    
    // Exclui o produto com ID 31 da listagem da categoria
    $produtos = Produto::where('id_categoria', $id)
                       ->where('id', '!=', 31)
                       ->paginate(3);

    return view('site.categoria', compact('produtos', 'categoria'));
    }
}