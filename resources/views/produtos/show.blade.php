@extends('layout')

@section('content')
    <h1>{{ $produto->nome }}</h1>
    <p>{{ $produto->descricao }}</p>
    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}">
@endsection
