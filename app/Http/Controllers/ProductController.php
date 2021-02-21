<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {

        $this->request = $request;
        $this->repository = $product;
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
        //Obtendo os valores enviados pela view
        //no lugar da função only() podemos utilizar
        //a função all() para retornar todos os dados do form
        $data = $request->only('name', 'description', 'price');

        //Nesse ponto todos os dados vindos do form
        //são gravados no banco
        $this->repository->create($data);

        return redirect()->route('products.index');
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
        if (!$product = $this->repository->find($id))
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
        if (!$product = $this->repository->find($id))
            //redirect()->back() retorna ao ponto anterior
            return redirect()->back();
        return view('admin.pages.products.edit', [
            'product' => $product
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        if (!$product = $this->repository->find($id))
            //redirect()->back() retorna ao ponto anterior
            return redirect()->back();

        $product->update($request->all());
        
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$product = $this->repository->find($id))
            //redirect()->back() retorna ao ponto anterior
            return redirect()->back();

        $product->delete();

        return redirect()->route('products.index');
    }
}
