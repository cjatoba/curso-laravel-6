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
}
