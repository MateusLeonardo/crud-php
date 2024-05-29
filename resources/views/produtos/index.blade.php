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
                    <a href="{{ route('produtos.show', $produto->codigo) }}">{{ $produto->nome }}</a>
                </div>
                <div>
                    <a href="{{ route('produtos.edit', $produto->codigo) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto->codigo) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
