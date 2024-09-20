@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="container">
    @if ($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
                <span class="card-title">Parabéns!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if ($mensagem = Session::get('atencao'))
        <div class="card red">
            <div class="card-content white-text">
                <span class="card-title">Atenção!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if ($mensagem = Session::get('aviso'))
        <div class="card yellow darken-2">
            <div class="card-content white-text">
                <span class="card-title">Aviso!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if ($mensagem = Session::get('vazio'))
        <div class="card blue lighten-2">
            <div class="card-content white-text">
                <span class="card-title">Carrinho vazio!</span>
                <p>Aproveite nossos produtos!</p>
            </div>
        </div>
    @endif

    @if ($itens->count() == 0)
        <h5>Seu carrinho está vazio.</h5>
    @else
        <h5>Seu carrinho tem {{ $itens->count() }} produtos.</h5>   
        <table class="striped">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($itens as $item)
                <tr>
                    <td>
                        <img src="{{ asset($item->options->image) }}" class="responsive-img" alt="{{ $item->name }}" style="max-width: 70px;">

                    </td>
                    <td>{{ $item->name }}</td>
                    <td>R${{ number_format($item->price, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('site.atualizacarrinho') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->rowId }}">
                            <input style="width:40px; font-weight:900; margin-right: 15px;" type="number" name="qty" value="{{ $item->qty }}" min="1"> 
                        </form>
                    </td>
                    <td>
                        {{-- BOTÃO ATUALIZAR --}}
                        <button class="btn-floating waves-effect waves-light orange" onclick="this.closest('form').submit();" style="margin-right: 5px;">
                            <i class="material-icons right">refresh</i>
                        </button>

                        {{-- BOTÃO REMOVER CARRINHO --}}
                        <form action="{{ route('site.removecarrinho') }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->rowId }}">
                            <button class="btn-floating waves-effect waves-light red"><i class="material-icons right">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="card green darken-3">
            <div class="card-content white-text">
                <span class="card-title">Total: R${{ number_format(\Cart::subtotal(), 2, ',', '.') }}</span>
                <p>Pague em 12x sem juros.</p>
            </div>
        </div>
    @endif
            
    <div class="row container center">
        <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></a>
        
        <a href="{{ route('site.limpacarrinho') }}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>
        
        <button class="btn waves-effect waves-light green">Finalizar Compra<i class="material-icons right">check</i></button>
    </div>
</div>
@endsection
