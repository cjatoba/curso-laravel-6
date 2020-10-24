<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
