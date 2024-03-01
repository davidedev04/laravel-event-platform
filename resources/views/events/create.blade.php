@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="text-center">
            <form action="{{route('event.store')}}" method="POST">
                @csrf
                @method('POST')
                <!-- <h2 name="nome_utente">
                    salve {{$user->name}}
                </h2> -->
                <div>
                    <select name="nome_utente" id="nome_utente">
                        <option value="{{$user->id}}"> salve {{$user->name}}</option>
                    </select>
                </div>
                <div>
                    <label for="nome"> inserisci il nome</label>
                    <br>
                    <input type="text" id="nome" name="nome">
                </div>
                <div>
                    <label for="luogo"> inserisci il luogo dell'evento </label>
                    <br>
                    <input type="text" id="luogo" name="luogo">
                </div>
                <div>
                    <label for="data"> inserisci il nome</label>
                    <br>
                    <input type="date" name="data" id="data">
                </div>
                <div>
                    <label for="descrizione"> inserisci la descrizione dell'evento</label>
                    <br>
                    <input type="text" id="descrizione" name="descrizione">
                </div>
                @foreach($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{ $tag -> id }}" id="tag{{ $tag -> id }}">
                    <label for="">{{ $tag -> nome }}</label>
                    <br>
                </div>

                @endforeach
                <input type="submit" value="crea evento">
            </form>
        </div>
    </div>
</div>
@endsection