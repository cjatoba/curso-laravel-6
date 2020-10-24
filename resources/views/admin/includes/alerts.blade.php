{{-- 
    errors any() verifica se existe erro, se existir redireciona para a página anterior
    e exibe as mensagens de validação
--}}
@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li> 
        @endforeach
    </ul>
@endif
