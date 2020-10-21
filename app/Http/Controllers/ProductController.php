<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
        
        //Aplicando middleware (filtros)

        //Middleware apenas em métodos específicos
        /*$this->middleware('auth')->only([
            'create', 'store'
        ]);*/


        //Middleware não são aplicados em métodos específicos
        /*$this->middleware('auth')->except([
            'index', 'show'
        ]);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 123;
        $teste2 = 654;
        $teste3 = [1,2,3,4,5];
        $products = ['Violão', 'Teclado', 'Bateria', 'Contra baixo'];
        //Enviando variáveis para a view
        //o compact envia as variáveis separadas por vírgula em formato de array
        //por exemplo compact('var1', 'var2', 'var3')
        return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Request->all() retorna todos os campos do formulário submetido
        //dd($request->all());
        
        /* 
            Request->only() retorna dados específicos, 
            pode ser somente um passando uma string ou vários passando em um array 
         */
        //dd($request->only(['name', 'description']));
        
        /* 
            Request->name retorna o valor de um atributo em específico, 
            no caso do exemplo retorna o valor do atributo name 
         */
        //dd($request->name);

        // O has verifica se um valor existe e retorna true ou false
        //dd($request->has('name'));
        
        //O input retorna o valor do campo caso ele exista 
        //caso contrário retorna null
        //dd($request->input('name'));
        
        //O input com um segundo parâmetro retorna o valor do campo caso ele não seja vazio, 
        //caso contrário retorna o valor do segundo parâmetro no caso do exemplo teste
        //dd($request->input('name', 'teste'));
        
        //O except retorna todos os campos submetidos
        //exceto o campo especificado, no caso do exemplo não retorna o valor de _token
        //podem ser passados vários campos separados por vírgula ou um array com os campos 
        dd($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Detalhes do produto {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('Editando o produto {$id}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
