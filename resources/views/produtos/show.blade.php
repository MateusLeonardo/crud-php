@extends('layout')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h1>{{ $produto->nome }}</h1>
        </div>
        <div class="card-body">
            <p>{{ $produto->descricao }}</p>
            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="img-thumbnail" width="300">
            <p>Categoria: {{ $produto->categoria->nome }}</p>
            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
            </form>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
    </div>
@endsection
