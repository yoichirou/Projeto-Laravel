@extends('layouts.fo')

@section('title', 'Dashboard')

@section('content')

    {{-- @auth
        <!-- Formulário oculto para fazer logout seguro no Laravel -->
        <form id="logout-inatividade-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <script>
            let timerInatividade;
            // 5 minutos em milissegundos (5 * 60 * 1000)
            const TEMPO_INATIVIDADE = 300000;

            function reiniciarTimer() {
                // Cancela o timer anterior
                clearTimeout(timerInatividade);

                // Inicia um novo timer de 5 minutos
                timerInatividade = setTimeout(() => {
                    document.getElementById('logout-inatividade-form').submit();
                }, TEMPO_INATIVIDADE);
            }

            // Eventos que reiniciam a contagem de inatividade
            window.addEventListener('load', reiniciarTimer);
            document.addEventListener('mousemove', reiniciarTimer);
            document.addEventListener('keydown', reiniciarTimer);
            document.addEventListener('click', reiniciarTimer);
            document.addEventListener('scroll', reiniciarTimer);
        </script>
    @endauth --}}


    @if (Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
        <div class="alert alert-success mt-1">Você é Administrador</div>
    @endif

    <h1>Olá {{ Auth::user()->name }}</h1>


@endsection
