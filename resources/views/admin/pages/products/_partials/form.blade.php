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
@include('admin.includes.alerts')
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="price" placeholder="Preço:" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="description" placeholder="Descrição" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <input type="file" class="form-control" name="image">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>
