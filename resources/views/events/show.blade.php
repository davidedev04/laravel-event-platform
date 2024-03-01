@extends('layouts.app')
@section('head')
    <title>Show</title>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="text-center">
                <h1>Evento selezionato</h1>
                <ul>
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
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection