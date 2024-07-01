@extends('layout')

@section('content')
    <h1>Editar Produto</h1>
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome" style="display: block;">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $produto->nome }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" required style="resize: none;">{{ $produto->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria:</label>
            <select id="categoria_id" name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $produto->categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem" class="form-control-file">
        </div>
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('produtos.index')}}">Voltar</a>
        </div>
    </form>
@endsection
