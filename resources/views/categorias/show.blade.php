@extends('layout')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h1>Detalhes da Categoria</h1>
        </div>
        <div class="card-body">
            <h2>{{ $categoria->nome }}</h2>
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
            </form>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3>Produtos desta Categoria</h3>
        </div>
        <div class="card-body">
            @if($categoria->produtos->count() > 0)
                <ul class="list-group">
                    @foreach($categoria->produtos as $produto)
                        <li class="list-group-item">
                            <a href="{{ route('produtos.show', $produto->codigo) }}">{{ $produto->nome }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Nenhum produto cadastrado nesta categoria.</p>
            @endif
        </div>
    </div>
@endsection
