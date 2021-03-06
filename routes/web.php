<?php

//Rota para busca de produtos
//a rota é do tipo any para não perder a paginação na lista de produtos
Route::any('products/search', 'ProductController@search')->name('products.search')->middleware('auth');

//A rota resource já cria as rotas necessárias para o CRUD
Route::resource('products', 'ProductController')->middleware(['auth', 'check.is.admin']);


//Rotas da forma correta
//Chamando o método index do ProductController
//É uma boa prática não deixar lógicas nas rotas
//como nos exemplos iniciais, mas sim chamar um controller
//para ele sim fazer os returns
/*
//Rota para deletar um produto
Route::delete('products/[id]', 'ProductController@destroy')->name('products.destroy');
//Rota para editar um registro
Route::put('products/{id}', 'ProductControlle@update')->name('products.update');
//Rota para editar um produto
Route::get('products/edit/{id}', 'ProductController@edit')->name('products.edit');
//Rota para criar um produto
Route::get('products/create', 'ProductController@create')->name('products.create');
//Rota para exibir um produto específico
Route::get('products/{id}', 'ProductController@show')->name('products.show');
//Rota para listar todos os produtos
Route::get('products', 'ProductController@index')->name('products.index');
//Rota para cadastro de produto (Para cadastrar utilizar o verbo http post)
Route::post('products', 'ProductController@store')->name('products.store');
*/

Route::get('/login', function() {
    return 'Tela de login';
})->name('login');

/*
//Grupo de rotas com middleware (filtro) de autenticação
//Ao utilizar uma rota com middleware Auth a rota é direcionada
//para a login caso o user não esteja autenticado

//Grupo de middleware, prefix, namespace e name
//pode ser apenas um ou um array com vários midlewares
Route::group([
        'middleware' => [],
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'name' => 'admin.'
], function() {
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    //Rota / dentro do prefixo admin (admin/)
    Route::get('/', function() {
        return redirect('dashboard');
    })->name('admin.home');

});

//Rota nomeada, melhor forma de utilizar e facilitar a manutenção
//Caso seja o nome da rota a ser digitada no navegador precise
//ser alterada, não precisamos alterar todas as chamadas da rota no projeto
//alteramos apenas a chamada aqui nesse arquivo
Route::get('redirect3', function() {
    return redirect()->route('url-name');
});

Route::get('/name-url', function() {
    return 'Rota nomeada';
})->name('url-name');

//Rota direta para view sem passar por Controller
//(Recomendado apenas para views que não precisem de lógica nem parâmetros)
Route::view('/view', 'welcome');

//Redirecionamento de rotas
Route::redirect('redirect1', 'redirect2');

Route::get('redirect', function() {
    return redirect('redirect2');
});

Route::get('redirect2', function() {
    return "Redirect2";
});

//Parâmetros opcionais, com ? no final
Route::get('/produtos/{idProduct?}', function($idProduct = '') {
    return "Produtos(s) {$idProduct}";
});

//Parâmetros obrigatórios seguido de rota fixa
Route::get('/categoria/{flag}/posts', function($flag) {
    return "Posts da categoria: {$flag}";
});

//Parâmetro obrigatório
Route::get('/categorias/{flag}', function($parm1) {
    return "Produtos da categoria: {$parm1}";
});

//A rota any aceita todos os verbos http (get, post put...)
Route::any('/any', function() {
    return 'Any';
});

//Rota com o verbo http post
Route::post('/register', function(){
    return "Register";
});

//Rota com verbo http get
Route::get('/empresa', function(){
    return "Empresa";
});

//Rota para subpastas dentro da pasta view (Utilizamos o . antes do subdiretório)
Route::get('/contato', function(){
    return view("site.contact");
});
 */
//Rota para página na raiz da pasta view
Route::get('/', function () {
    return view('welcome');
});

//O parâmetro ['register' => false] desabilita a função de registro
Auth::routes(['register' => false]);
