@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="container">

    @if ($mensagem=Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
                <span class="card-title">Parabéns!</span>
                <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif

    @if ($mensagem=Session::get('atencao'))
        <div class="card red">
            <div class="card-content white-text">
                <span class="card-title">Atenção!</span>
                <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif

    @if ($mensagem=Session::get('aviso'))
        <div class="card yellow darken-2">
            <div class="card-content white-text">
                <span class="card-title">Aviso!</span>
                <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif

    @if ($mensagem=Session::get('vazio'))
        <div class="card blue lighten-2">
            <div class="card-content white-text">
                <span class="card-title">Vazio!</span>
                <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif
    
    <h5>Seu carrinho tem {{ $itens->count() }} produtos.</h5>   
    <table class="striped">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($itens as $item)
            <tr>
                <td>
                    @if(isset($item->attributes->image))
                        <img src="{{ $item->attributes->image }}" alt="" width="70" class="responsive-img circle">
                    @else
                        <img src="default-image-url.png" alt="Imagem não disponível" width="70" class="responsive-img circle">
                    @endif
                </td>
                <td>{{ $item->name }}</td>
                <td>R${{ number_format($item->price, 2, ',', '.') }}</td>
                
                <td>
                    {{-- BOTÃO ATUALIZAR --}}
                    <form action="{{ route('site.atualizacarrinho') }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->rowId }}">
                        <input style="width:40px; font-weight:900; margin-right: 15px;" type="number" name="qty" value="{{ $item->qty }}" min="1"> 
                        <button class="btn-floating waves-effect waves-light orange" style="margin-right: 5px;">
                            <i class="material-icons right">refresh</i>
                        </button>
                    </form>
                    
                    {{-- BOTÃO REMOVER CARRINHO --}}
                    <form action="{{route('site.removecarrinho')}}" method="POST" enctype="multipart/form-data" style="display: inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->rowId}}">
                        <button class="btn-floating waves-effect waves-light red"><i class="material-icons right">delete</i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            
    <div class="row center">
        <button class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></button>
        
        <a href="{{route('site.limpacarrinho')}}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>
        
        <button class="btn waves-effect waves-light green">Finalizar Compra<i class="material-icons right">check</i></button>
    </div>
</div>
@endsection
