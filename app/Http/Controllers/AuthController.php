<?php  

namespace App\Http\Controllers;  

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  

class AuthController extends Controller  
{  
    public function login(Request $request)  
    {  
        // Validação dos dados de entrada  
        $credentials = $request->validate([  
            'name' => 'required',  
            'password' => 'required',  
        ]);
        // Verifica se o usuário existe e a senha está correta  
        if (Auth::attempt($credentials)) {  
            // dd($request->session()->regenerate());
            // Pega o usuário autenticado  
            $user = Auth::user();  
            // Cria o token  
            $token = $user->createToken('Auth Token')->plainTextToken;  

            // Retorna o token na resposta  
            return response()->json([  
                'token' => $token,  
                'user' => $user,  
            ]);  
        }  

        // Se credenciais não conferem  
        return response()->json(['message' => 'Credenciais invalidas'], 401);  
    }  
}  

//Token: 1|Dg7OVb6cllhwM1mrjma8mwsxF8ynFD8x0gMyzH3g14e3de57