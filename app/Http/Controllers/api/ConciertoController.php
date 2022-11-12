<?php

namespace App\Http\Controllers\api;

use App\Concierto;
use App\GrupoConcierto;
use App\MedioConcierto;
use App\Http\Controllers\Controller;
use App\Notifications\NewConcierto;
use App\Promotor;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class ConciertoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'fecha' => 'required|date|date_format:Y-m-d',
            'id_recinto' => 'required|integer|exists:recintos,id',
            'id_promotor' => 'required|integer|exists:promotores,id',
            'numero_espectadores' => 'required|integer',
            'grupos' => 'required|array',
            'grupos.*.id' => 'required_with:grupos|integer|exists:grupos,id',
            'medios' => 'required|array',
            'medios.*.id' => 'required_with:medios|integer|exists:medios,id',
        ]);

        // Valid request
        // Create a new Concierto
        $newConcierto = new Concierto();

        $newConcierto->nombre = $request->nombre;
        $newConcierto->fecha = $request->fecha;

        $newConcierto->id_recinto = $request->id_recinto;
        $newConcierto->id_promotor = $request->id_promotor;

        $newConcierto->numero_espectadores = $request->numero_espectadores;

        $request->grupos->each(function ($grupo) use ($newConcierto) {

            $grupoConcierto = new GrupoConcierto();
            $grupoConcierto->id_grupo = $grupo->id;
            $grupoConcierto->id_concierto = $newConcierto->id;
            $grupoConcierto->save();
        });

        $request->medios->each(function ($medio) use ($newConcierto) {

            $medioConcierto = new MedioConcierto();
            $medioConcierto->id_grupo = $medio->id;
            $medioConcierto->id_concierto = $newConcierto->id;
            $medioConcierto->save();
        });

        $newConcierto->getRentabilidad();

        $newConcierto->save();

        $promotor = $newConcierto->promotor()->first();

        $promotor->notify(new NewConcierto($newConcierto));

        return response()->json([
            'status' => 'CREATED',
            'concierto_id' => $newConcierto->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Concierto  $concierto
     * @return \Illuminate\Http\Response
     */
    public function show(Concierto $concierto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Concierto  $concierto
     * @return \Illuminate\Http\Response
     */
    public function edit(Concierto $concierto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concierto  $concierto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concierto $concierto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Concierto  $concierto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concierto $concierto)
    {
        //
    }
}

