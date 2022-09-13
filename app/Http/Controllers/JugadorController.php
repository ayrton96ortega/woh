<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivarJugadorRequest;
use App\Models\Item;
use App\Services\JugadorService;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JugadorService $jugadorService)
    {
        $jugadorService->createJugador($request);
    }

    public function activar(ActivarJugadorRequest $request, JugadorService $jugadorService)
    {
        $jugadorService->activarJugador($request);
    }

    public function update(Request $request, JugadorService $jugadorService){
        $jugadorService->añadirItem($request);
    }

    public function atacar(JugadorService $jugadorService, $id, $ataque){
        $jugadorService->atacarJugador($ataque, $id);
    }

    public function indexUlti(JugadorService $jugadorService){
        $jugadorService->verJugadoresUlti();
    }

    public function addInventario(Request $request, JugadorService $jugadorService){
        $jugadorService->crearInventario($request);
    }
}
