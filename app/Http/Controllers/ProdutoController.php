<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::paginate(5);
        

        return view('admin.produtos', compact('produtos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $produto = $request->all();

    if ($request->hasFile('imagem')) {
        // Armazena a imagem na pasta 'produtos' no disco público
        $produto['imagem'] = $request->imagem->store('produtos', 'public'); 
    }

    $produto['slug'] = Str::slug($request->nome);

    Produto::create($produto);

    return redirect()->route('admin.produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $produto= Produto::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('sucesso','Produto removido com sucesso!');
    }
}
