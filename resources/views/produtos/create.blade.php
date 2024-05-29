@extends('layout')

@section('content')
    <h1>Adicionar Produto</h1>
    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="nome" style="display: block;">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descricao" style="display: block;">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" style="resize: none;" required></textarea>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem" class="form-control-file" required>
        </div>
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('produtos.index')}}">Voltar</a>
        </div>
    </form>

@endsection
