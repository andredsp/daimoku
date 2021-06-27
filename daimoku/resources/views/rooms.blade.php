
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Saguão de Entrada') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @foreach ($rooms as $room)
                    <room>
                        <h3>
                            <a href="/salas/{{ $room->slug }}"> {{ $room->title }} </a>
                        </h3>
                    </room>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
