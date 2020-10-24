@extends('admin.layouts.app')

@section('title', 'Cadastro de produtos')

@section('content')
    <h1>Cadastro de produtos</h1>

    {{-- Para envio de arquivos é necessário o campo enctype caso contrário o envio não funciona--}}
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.products._partials.form')
    </form>    
@endsection
