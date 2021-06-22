<!DOCTYPE html>
<title>
    Sala X
</title>
<link href="/app.css" rel="stylesheet" type="text/css">
    <body>
        <room>
            <h1> {{ $room->title }} </h1>

            <h2> Blocos </h2>
            <code>
                @foreach ($room->blocks as $block)
                	{{ $block->user->name[0] }}
            	@endforeach
            </code>

            <h2> Participantes </h2>
            <ul>
	            @foreach ($room->attendances as $attendance)
		            <li>{{ $attendance->user->name }}</li>
            	@endforeach		            
            </ul>            
        </room>
        <a href="/salas">
            Voltar
        </a>
    </body>
</link>