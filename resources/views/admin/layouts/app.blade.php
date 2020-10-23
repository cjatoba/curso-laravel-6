<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Admin Page</title>
    {{--
        A stack abaixo recebe de outras páginas o conteúdo do css,
        caso o css deva ser aplicado em todas as páginas substituir
        a linha abaixo pelo link direto do css
     --}}
    @stack('styles')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    {{--
        A stack abaixo recebe de outras páginas o conteúdo do script javascript,
        caso o script deva ser aplicado em todas as páginas substituir
        a linha abaixo pelo link direto do script
     --}}
    @stack('scripts')
</body>
</html>
