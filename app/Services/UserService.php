<?
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService{

    public function logearse($request){
        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                'mensaje'=> 'datos invalidos'
            ],401);
        }
        $user = User::where('email',$request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'acces_token'=> $token,
            'type_token'=> 'Bearer'
        ]);
    }

    public function crearUsuario($request){
        $user = User::create($request->all());
        $user->assignRole($request->rol);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'acces_token' => $token,
            'token_type' => 'Bearer'
        ]);

    }

    public function tenerUsuario()
    {
        if (Auth::user()->hasRole('Jugador')) {
            return response()->json(['entre al index',true]);
        }

    }
}
