<?php

//Grupo de rotas com middleware (filtro) de autenticação
//Ao utilizar uma rota com middleware Auth a rota é direcionada
//para a login caso o user não esteja autenticado
Route::get('/login', function() {
    return 'Tela de login';
})->name('login');

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

//Rota para página na raiz da pasta view
Route::get('/', function () {
    return view('welcome');
});
