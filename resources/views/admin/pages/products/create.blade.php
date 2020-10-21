@extends('admin.layouts.app')

@section('title', 'Cadastro de produtos')

@section('content')
    <h1>Cadastro de produtos</h1>

    {{-- 
         errors any() verifica se existe erro, se existir redireciona para a página anterior
        e exibe as mensagens de validação
     --}}
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li> 
            @endforeach
        </ul>
    @endif

    {{-- Para envio de arquivos é necessário o campo enctype caso contrário o envio não funciona--}}
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
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
        <input type="text" name="name" placeholder="Nome:" value="{{ old('name') }}">
        <input type="text" name="description" placeholder="Descrição" value="{{ old('description') }}">
        <input type="file" name="photo">
        <button type="submit">Enviar</button>
    </form>    
@endsection
