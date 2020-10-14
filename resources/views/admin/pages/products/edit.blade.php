@extends('admin.layouts.app')

@section('title', 'Editar produto')

@section('content')
    <h1>Editar produto {{ $id }}</h1>

    <form action="{{ route('products.update', $id) }}" method="post">

        <!--A diretiva method especifica qual verbo http é utilizado na requisição -->
        @method('PUT')
        <!--
            O Laravel por segurança aguarda um token de validação
            para confirmar se a requisição foi realmente feita
            pelo Laravel, a diretiva csrf cria um input hidden
            com um token de validação
         -->
        @csrf
        <input type="text" name="name" placeholder="Nome:">
        <input type="text" name="description" placeholder="Descrição">
        <button type="submit">Enviar</button>
    </form>    
@endsection
