<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('entrada') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <h1 class="text-center text-xl font-extrabold mb-4">Seja bem-vindo(a)!</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if (count($guests) > 0)
            <div class="mt-4">Procure seu nome na lista</div>
        @endif

        @foreach ($guests as $guest)

            {{-- Known Guests --}}
            <form method="POST" action="{{ route('convidado') }}">
                @method('PUT')
                @csrf

                <input type="hidden" name="user_id" value="{{ $guest->id }}">

                <div class="flex items-center mt-2">
                    <x-button class="ml-3">{{ $guest->name }}</x-button>
                </div>
            </form>
        @endforeach

        {{-- New Guest --}}
        @if (count($guests) > 0)
            <div class="mt-4">Se não encontrar, digite abaixo</div>
        @else
            <div class="mt-4">Por favor, digite seu nome</div>
        @endif

        <form method="POST" action="{{ route('convidado') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-1">
                <x-button class="ml-3">Entrar como convidado</x-button>
            </div>
        </form>

        <div class="mt-8">Outras opções</div>
        <div class="flex items-center">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Já tenho cadastro
            </a>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-3" href="{{ route('register') }}">
                Novo usuário
            </a>
        </div>

    </x-auth-card>
</x-guest-layout>
