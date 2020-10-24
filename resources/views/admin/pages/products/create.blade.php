@extends('admin.layouts.app')

@section('title', 'Cadastro de produtos')

@section('content')
    <h1>Cadastro de produtos</h1>

    @include('admin.includes.alerts')

    {{-- Para envio de arquivos é necessário o campo enctype caso contrário o envio não funciona--}}
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form">
        {{--
            O Laravel por segurança aguarda um token de validação
            para confirmar se a requisição foi realmente feita
            pelo Laravel, a diretiva csrf cria um input hidden
            com um token de validação
         --}}
        @csrf
        {{-- 
            O atributo old retorna o último valor registrado no campo,
            o Laravel guarda este valor em um sessão temporária chamada sessão flash 
        --}}
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="price" placeholder="Preço:" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="description" placeholder="Descrição" value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>    
@endsection
