@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar Produto</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <ul class="list-group">
        @foreach ($produtos as $produto)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5>{{ $produto->nome }}</h5>
                    <p>{{ $produto->descricao }}</p>
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="img-thumbnail" width="150">
                    <p>Categoria: {{ $produto->categoria ? $produto->categoria->nome : 'Sem categoria' }}</p>
                </div>
                <div>
                    <a href="{{ route('produtos.show', ['produto' => $produto->id]) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
