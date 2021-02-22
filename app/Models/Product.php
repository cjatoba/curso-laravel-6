<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'products';

    //O fillable especifica quais campos podem ser registrados no banco
    //garantindo uma mairo segurança a ataques
    //pois o usuários não conseguirá inserir dados em outros campos
    protected $fillable = ['name', 'price', 'description', 'image'];

    /**
     * Filter products
     */
    public function search($filter = null){
        //o parâmetro use($filter) permite que a variavel $filter que vem como 
        //parâmetro no método search possa ser utilizada dentro da função de callback
        //caso contrário ocorreria um erro
        $results = $this->where(function($query) use($filter){
            if ($filter){
                $query->where('name', 'LIKE', "%{$filter}%");
                //Caso seja necessário realizar mais filtros acrescentar aqui
            }
        })->paginate();

        return $results;
    }
}