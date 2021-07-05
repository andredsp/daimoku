<x-app-layout>
    <x-slot name="refresh">15</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $room->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3> Gráfico de Daimoku </h3>
                    <code>
                        @foreach ($room->blocks as $block)
                        {{ $block->user->name[0] }}
                        @endforeach
                    </code>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2> Participantes Atuais </h2>
                    <ul>
                        @foreach ($room->attendances()->whereNull('left_at')->get() as $attendance)
                        <li>{{ $attendance->user->name }}</li>
                        @endforeach                 
                    </ul> 
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
