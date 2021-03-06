<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Guarda o usuário logado em $user
        $user = auth()->user();

        //Verifica se o e-mail do usuário logado está no array
        //caso não esteja direciona para a rota /
        if (!in_array($user->email, ['iweber@example.net', 'constance.friesen@example.net'])) {
            return redirect('/');
        }

        return $next($request);
    }
}
