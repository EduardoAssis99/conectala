<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Realiza autenticação do usuário se dados enviados forem validos 
     */
    public function login(AuthRequest $request)
    {
    
        try {
            $user = User::where("email", $request->email)->first();

            if (!empty($user)) {
            
                if(Hash::check($request->password, $user->password)) {
                
                    $token = $user->createToken("conectaLa")->plainTextToken;

                    return response()->json([
                        "status" => true,
                        "message"   => "Logado com sucesso!",
                        "token"=> $token
                    ]);

                }else{
                    return response()->json([
                        "status" => true,
                        "message"   => "Senha incorreta."
                    ]);
                }

            }else{
                return response()->json([
                    "status" => true,
                    "message"   => "Usuário não encontrado."
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message"   => 'Ocorreu um erro inesperado, verifique os dados e tente novamente.',
            ]);
        }
    }

    /**
     * Realiza o encerramento da sessão do usuário que estava logado. 
     */
    public function logout(){
        
        auth()->user()->tokens()->delete();

        return response()->json([
            'status'=> true,
            'message'   => 'Deslogado com sucesso!',
        ]);

    }

}
