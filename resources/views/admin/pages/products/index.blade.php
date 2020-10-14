@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    @if($teste === '123')
        <p>É igual</p>
    @elseif($teste == 123)
        <p>É igual a 123</p>
    @else
        <p>Não é igual</p>
    @endif

    @unless($teste === '123')
        <p>Retorno caso a condição seja falsa</p>
    @else
        <p> Retorno caso a condição seja verdadeira</p>
    @endunless

    @isset($teste2)
        <p>Retorno o valor {{ $teste }} caso ele exista</p>
    @endisset

    @empty($teste3)
        <p>Retorno caso o valor seja vazio</p>
    @endempty

    @auth
        <p>Retorno casoo user esteja autenticado</p>
    @else
        <p>Retorno caso o user não esteja autenticado</p>
    @endauth

    @guest
        <p>Retorno caso o user não esteja autenticado</p>
    @endguest

    @switch($teste)
        @case(1)
            Retorno case = 1
            @break
        @case(2)
            Retorno case = 2
            @break
        @default
            Retorno = default
    @endswitch
@endsection
