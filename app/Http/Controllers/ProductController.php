<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//É uma boa prática Inicia o nome da classe com letra maiúscula
//e em seguida "Controller"
class ProductController extends Controller
{
        //É uma boa prátiva para listagens utilizar o nome index para o método
        public function index()
        {
            $products = ['Product 01', 'Product 02', 'Product 03'];

            //Por padrão quando retornamos um array o Laravel converte 
            //a saída para o formato Json
            return $products;
        }
}
