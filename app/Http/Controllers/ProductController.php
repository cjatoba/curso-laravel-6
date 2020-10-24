<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
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
        //Paginar os registros
        //por padrão são exibidos 15 registros por página
        //para alterar o valor inserir um número como parâmetro da função paginate
        //a função latest() lista o últimos registros
        //sem esta função são listados os primeiros registros'
        $products = Product::latest()->paginate();
        //Enviando variáveis para a view
        //Obs a função compact foi descontinuada no PHP, utilizar um array como abaixo
        return view('admin.pages.products.index', [
            'products' => $products
        ]);
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
     * @param \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        dd('OK');
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
        //dd($request->except('_token'));

        //Upload de arquivo

        //'photo' é o nome do campo do tipo file que envio o arquivo pelo formulário
        //isValid retorna true caso o arquivo seja valido
        if($request->file('photo')->isValid()){
            //extension retorna a extenção do arquivo
            //dd($request->photo->extension());
            
            //getClientOriginalName retorna o nome original do arquivo
            //Não é recomendado usar esse nome para guardar pois pode se repetir
            //e sobreescrever outros
            //dd($request->photo->getClientOriginalName());

            //Faz o upload do arquivo por padrão na pasta storage/app
            //para que salve o arquivo em uma subpasta o caminho
            //dela deve ser especificado como parâmetro para o 
            //método store, o Laravel já cria por padrão um nome
            //único para o arquivo
            dd($request->file('photo')->store('products'));

            //Faz o upload do arquivo com um nome personalizado
            //$nameFile = $request->name . '.' . $request->photo->extension();
            //dd($request->file('photo')->storeAs('products', $nameFile));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //A função where faz uma busca nesse caso no model Product
        //vai buscar no campo 'id'
        //outra forma de bisca é utilizando a função find que recupera
        //um item através do seu id
        //caso o valor não seja encontrado é retornado NULL
        //$product = Product::where('id', $id)->first();
        if (!$product = Product::find($id))
            //redirect()->back() retorna ao ponto anterior
            return redirect()->back();

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
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
