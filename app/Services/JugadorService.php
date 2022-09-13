<?
namespace App\Services;

use App\Actions\SumarPuntos;
use App\Models\Ataque;
use App\Models\Item;
use App\Models\Jugador;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JugadorService{

    public function buscarJugador($jugador){
        return Jugador::find($jugador);
    }

    public function createJugador($request){
        $jugador = new Jugador();
        $jugador->tipo_jugador_id = $request->tipo_jugador_id;
        $user = User::find(Auth::user()->id);
        $user->jugador()->save($jugador);
        return response()->json(['Jugador creado exitosamente', 201]);
    }

    public function activarJugador($request){
        //verificar usuario en base de datos
        try {
            $user = User::where('email', $request->email)->first();
            $user->jugador->activo = 1;
            $user->update();
            return response()->json(['jugador activado exitosamente'], 200);
        } catch (\Throwable $th) {
            return response()->json(['No se pudo activar, vuelve a intentarlo', $th], 300);
        }
    }

    public function añadirItem($request){
        //busco el item que quiere
        $itemId = Item::find($request->item);
        $jugador = Jugador::find(Auth::user()->id);
        $valor_item = $jugador->items->where('tipo_items_id', $itemId->tipo_items_id)->first();
        if (!$valor_item->tipo_items_id == $request->item) {
            return response()->json($jugador->items()->attach(Auth::user()->id), 200);
        }else{
        if ($valor_item = []) {
            return response()->json($jugador->items()->attach(Auth::user()->id), 200);
        }
        return response()->json(['No puede tener mas de un item del mismo tipo'], 401);
        }
    }

    public function combatirJugador( $atacante, $defensor, $tipeAtaque){
        $ataque = Ataque::find($tipeAtaque);
        $ataqueTotal = sumarPuntos($atacante->items, 'ataque')*$ataque->valor;
        $resultadoPelea = $defensor->vida + sumarPuntos($defensor->items, 'defensa'); - $ataqueTotal;
        $defensor->vida = $resultadoPelea;
        $defensor->update();
        $atacante->ataque()->associate($ataque)->save();
        return response()->json(['Pelea exitosa'], 200);
    }

    public function atacarJugador($ataque, $id){
        $atacante = $this->buscarJugador(Auth::user()->id);
        $defensor = $this->buscarJugador($id);
        if($ataque==3){
            if(!$atacante->ataque->name == 'cuerpo'){
                return response()->json(['Ataque con ulti invalido, ataque anterior no fue cuerpo a cuerpo'], 401);
            }
        }
        if ($this->buscarJugador(Auth::user()->id)->activo==0 || $this->buscarJugador($id)->activo ==0) {
            return response()->json(['algun jugador incativo, no puede atacar'], 401);
        }
        if ($this->buscarJugador($id)->vida == 0){
            return response()->json(['El jugador defensor no tiene vida, no puede atacar'], 401);
        }
        return response()->json($this->combatirJugador( $atacante, $defensor, $ataque), 200);
    }

    public function verJugadoresUlti(){
        $jugadores = Jugador::where('ataque_id',2)->get();
        return response()->json(['entre para ver todas las ultis', $jugadores], 200);
    }

    public function crearInventario($request)
    {
        $item = Item::find($request->item)->first();
        return response()->json(['entre al inventario', $item]);
    }
}
