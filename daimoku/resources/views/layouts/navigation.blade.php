<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex max-w-sm">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/">
{{--                         <x-application-logo class="block h-10 w-auto fill-current text-gray-600" /> --}}
                        <x-label>Centro Virtual de Daimoku</x-label>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('entrada')" :active="request()->routeIs('entrada')">
                        {{ __('Saguão de Entrada') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center ml-6 align">
                @auth
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">

                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div style="text-align: right;">Olá, {{ Auth::user()->name }}</div>
                            </button>
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Identificar-se</div>
                        </button>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
