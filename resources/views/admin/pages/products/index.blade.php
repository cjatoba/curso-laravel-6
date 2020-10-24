@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>
    <hr>

    <table class="table table-striped">
        <thead>
            <th>Nome</th>
            <th>Preço</th>
            <th width="100">Ações</th>
        </thead>

        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                    </td>
                </tr>   
            @endforeach
        </tbody>        
    </table>
    
    {{-- Para exibir os links para navegação na paginação --}}
    {!! $products->links() !!}
@endsection

