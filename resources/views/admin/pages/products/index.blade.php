@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    <!--Reaproveitamento de código com envio de valor de uma view para outra-->
    @include('admin.includes.alerts', ['content' => 'Mensagem da view index para a view alert'])

    <hr>    

    @if(isset($products))
        @foreach($products as $product)
            <!-- O $loop->last verifica se é o último elemento do foreach-->
            <p class="@if($loop->last) last @endif">{{ $product }}</p>            
        @endforeach
    @endif

    <hr>
    @forelse($products as $product)
        <!-- O $loop->first verifica se é o primeiro elemento do foreach-->
        <p class="@if($loop->first) last @endif">{{ $product }}</p>
    @empty
        <p>Retorno caso o array seja vazio</p>
    @endforelse

    <hr>

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

<style>
    .last {background: #CCC;}
</style>
