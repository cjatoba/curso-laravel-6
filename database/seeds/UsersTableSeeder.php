<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Criação de usuários fake
        //User é a classe que será utilizada como base
        //10 é a quantidade de registros que serão criados
        factory(User::class, 10)->create();

        /*
        //Criação de usuário padrão
        User::create([
            'name' => 'User',
            'email' => 'user@teste.com',
            //A função bcrypt deve sempre ser utilizada para a criação de senha
            //com esta função o Laravel criptografa a senha
            'password' => bcrypt('123456')
        ]);
         */
    }
}
