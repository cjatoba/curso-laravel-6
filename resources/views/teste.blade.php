<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha View</title>
</head>
<body>
    <!-- 
        Este formato de impressão utiliza a função httpspecialchars
        que proteje de ataques Xss, pois imprime o conteúdo real da string
        não executa a tag <script> por exemplo se ela vier na string
    -->
    {{ $teste }}

    <!--
        Este formato de impressão não utiliza a função httpspecialchars
        deve ser utilizado para imprimir um conteúdo formatado, um <h1>
        por exemplo, mas somente quando tiver certeza de onde vem o conteúdo
        pois deixa a aplicação vulnerável
    -->
    {!! $teste !!}
</body>
</html>
