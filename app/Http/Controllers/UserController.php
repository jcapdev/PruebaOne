<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        User::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado correctamente'
        ]);
    }

    public function login(Request $request){
        $user = User::whereEmail($request->email)->first();

        if(!is_null($user) && Hash::check($request->password, $user->password))
        {   
            $fechaActual = date('d-m-Y');
            $correo = $request->email;            
            $val2 = Str::random(200);

            $texto_completo = $fechaActual .'|'. $correo . $val2;



            $user->api_token = $texto_completo;
            $user->save();           
            
            

            

            return response()->json([
                'res' => true,
                'token' => $user->api_token,
                'message' => 'Bienvenido al sistema'
            ]);

            


        }
        else{
            return response()->json([
                'res' => false,
                'message' => 'Cuenta o password incorrecto'
            ]);
        }
    }

    public function logout()
    {
        $user = auth()->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'res' => true,
            'message' => 'Adios'
        ]);
    }
}