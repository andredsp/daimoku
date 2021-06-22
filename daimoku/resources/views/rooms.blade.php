<!DOCTYPE html>
<title> Saguão </title>
{{--
<link href="/app.css" rel="stylesheet" type="text/css">
    --}}
    
    <body>
        <h1>
            Saguão
        </h1>
        @foreach ($rooms as $room)
        <room>
            <h2>
                <a href="/salas/{{ $room->slug }}"> {{ $room->title }} </a>
            </h2>
        </room>
        @endforeach
    </body>
</link>