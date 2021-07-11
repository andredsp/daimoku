<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @foreach ($guests as $guest)

            {{-- Known Guests --}}
            <form method="POST" action="{{ route('convidado') }}">
                @method('PUT')
                @csrf

                <input type="hidden" name="user_id" value="{{ $guest->id }}">

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">{{ $guest->name }}</x-button>
                </div>
            </form>
        @endforeach

        {{-- New Guest --}}
        <form method="POST" action="{{ route('convidado') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">Entrar como convidado</x-button>
            </div>
        </form>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Já possui cadastro?
            </a>

            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                Novo usuário
            </a>
        </div>

    </x-auth-card>
</x-guest-layout>
