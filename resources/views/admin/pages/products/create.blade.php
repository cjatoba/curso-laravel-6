@extends('admin.layouts.app')

@section('title', 'Cadastro de produtos')

@section('content')
    <h1>Cadastro de produtos</h1>

    {{-- Para envio de arquivos é necessário o campo enctype caso contrário o envio não funciona--}}
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        {{--
            O Laravel por segurança aguarda um token de validação
            para confirmar se a requisição foi realmente feita
            pelo Laravel, a diretiva csrf cria um input hidden
            com um token de validação
         --}}
        @csrf
        <input type="text" name="name" placeholder="Nome:">
        <input type="text" name="description" placeholder="Descrição">
        <input type="file" name="photo">
        <button type="submit">Enviar</button>
    </form>    
@endsection
