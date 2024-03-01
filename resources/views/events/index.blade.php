@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="text-center">
            <h1>lista di eventi</h1>
            @auth
            <a href="{{route('event.create')}}"> crea un nuovo evento</a>
            @endauth
            <ul>
                @foreach($events as $event)
                <li class="my-5">

                    <a href="{{ route('events.show', $event->id) }}">
                        <h3>
                            nome dell'evento:{{ $event->nome}}
                        </h3>
                    </a>
                    <div>
                        <strong> luogo evento: </strong>{{ $event->luogo}}
                    </div>
                    <div>
                        <strong>data evento: </strong>{{ $event->data}}
                    </div>
                    <div>
                        <strong>descrizione evento: </strong>{{ $event->descrizione}}
                    </div>
                    @auth
                        <form action="{{ route('events.destroy', $event -> id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"> Delete </button>
                        </form>
                    @endauth

                    
                    <a href="{{ route('events.edit', $event -> id) }}"><button>edit</button></a>
                    
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection