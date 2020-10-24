@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos</h1>
    <a href="{{ route('products.create') }}">Cadastrar</a>
    <hr>

    <table border="1">
        <thead>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="">Detalhes</a>
                    </td>
                </tr>   
            @endforeach
        </tbody>        
    </table>
    
    {{-- Para exibir os links para navegação na paginação --}}
    {!! $products->links() !!}
@endsection

