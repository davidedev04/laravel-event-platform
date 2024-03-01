@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Event: </h1>
        <form action="{{route('events.update', $event->id)}}" method="POST">
                @csrf
                @method('PUT')
                <!-- input dove c'è l'utente collegato -->
                <div>
                    <select name="nome_utente" id="nome_utente">
                        <option value="{{ $event -> id}}">{{$event->nome}}</option>
                    </select>
                </div>
                <!-- input dove si mette il nuovo evento -->
                <div>
                    <label for="nome"> inserisci il nome</label>
                    <br>
                    <input placeholder="{{$event->nome}}" type="text" id="nome" name="nome">
                </div>
                <!-- input dove si crea il luogo dell'evento -->
                <div>
                    <label for="luogo"> inserisci il luogo dell'evento </label>
                    <br>
                    <input placeholder="{{$event->luogo}}" type="text" id="luogo" name="luogo">
                </div>
                <!-- input dove si mette la data dell'evento -->
                <div>
                    <label for="data"> inserisci il nome</label>
                    <br>
                    <input type="date" name="data" id="data">
                </div>
                <!-- input dove si mette la descrizione dell'evento -->
                <div>
                    <label for="descrizione"> inserisci la descrizione dell'evento</label>
                    <br>
                    <input placeholder="{{$event->descrizione}}" type="text" id="descrizione" name="descrizione">
                </div>
                <!-- tutti i tags disponibili -->
                @foreach($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}">
                    <label for="">{{ $tag->nome }}</label>
                    <br>
                </div>

                @endforeach
                <input type="submit" value="aggiorna evento">
    </div>

@endsection