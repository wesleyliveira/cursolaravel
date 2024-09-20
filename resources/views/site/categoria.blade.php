@extends('site.layout')
@section('title','Curso Laravel')
@section('conteudo')

<style>
    .produto-img {
        display: block;
        width: 100%;  /* Largura completa do card */
        height: 200px; /* Altura fixa */
        object-fit: cover; /* Mantém a proporção e corta o excesso se necessário */
    }
    .card {
        height: 350px; /* Ajuste a altura do card para manter o tamanho uniforme */
    }
</style>
<div class="row container">
    <h5>Categoria: {{$categoria->nome}} </h5>

    @foreach ($produtos as $produto)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{$produto->nome}}" class="produto-img">
                <a href="{{route('site.details',$produto->slug)}}"class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                </div>
                <div class="card-content">
                <span class="card-title">{{$produto->nome}}</span>
                <p>{{Str::limit($produto->descricao,20)}}</p>
                </div>
            </div>
        </div>

    @endforeach

</div>
<div class="row center">
    {{$produtos->links('custom.pagination')}}
</div>


@endsection