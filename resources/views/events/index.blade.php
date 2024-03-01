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
                    <h3>
                        nome dell'evento:{{ $event->nome}}
                    </h3>
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
                    <button>delete</button>
                    @endauth

                    @auth
                    <button>aggiorna</button>
                    @endauth
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection