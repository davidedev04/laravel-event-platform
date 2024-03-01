<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importato i models
use App\Models\event;
use App\Models\tag;
use App\Models\User;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // metodo create per portare alla pagina dove verra creato un nuovo utente
        // $user = auth()->user(); permette di prendere l'utente che è loggato
        $user = auth()->user();
        $tags = tag::all();
        // portato alla pagina create
        return view('events.create', compact('tags', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // presa di tutti i dati
        $data = $request->all();
        // creato nuovo evento
        $event = new Event;
        // creazione dell'evento
        $event->nome = $data['nome'];
        $event->luogo = $data['luogo'];
        $event->data = $data['data'];
        $event->descrizione = $data['descrizione'];
        // associato l'utente con l'evento che ha creato
        $event->user()->associate($data['nome_utente']);

        $event->save();
        // aggiunto i tags dell'evento
        $event->tags()->attach($data['tags']);

        return redirect()->route('index.events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = event :: find($id);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
