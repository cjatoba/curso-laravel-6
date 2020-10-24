<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //A chamada do seeder pode ser feita em um array como 
        //no exemplo abaixo
        //$this->call([UsersTableSeeder::class, ProductsTableSeeder::class]);
        //ou pode ser chamado cada seeder individualmente
        //como abaixo:
        $this->call(UsersTableSeeder::class);
    }
}
