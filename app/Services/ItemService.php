<?
namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemService{

    public function activarItem($request){
        try {
            $itemActivo = Item::find($request->item);
            $itemActivo->activo = true;
            $itemActivo->update();
            return response()->json($itemActivo, 201);

        } catch (\Throwable $th) {
            return response()->json(['no se pudo activar item', $th], 300);
        }
    }

    public function modificarItem($request){
        try {
            $newItem = Item::find($request->id)->update($request->all());

            return response()->json(['Item acutalizado correctamente', $newItem],201);

        } catch (\Throwable $th) {
            return response()->json(['no se pudo actualizar item', $th], 300);
        }
    }
}
