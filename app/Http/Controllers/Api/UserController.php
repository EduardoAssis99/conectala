<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Lista todos os usuários.
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Cria um novo usuário, validando os dados no "StoreUserRequest"
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->all());
       
            return response()->json([
                "status" => true,
                "message"   => "Usuário Cadastrado com sucesso!",
                "data"  => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => true,
                "message"   => "Ocorreu um erro inesperado, verifique os dados e tente novamente.",
            ]);
        }

    }

    /**
     * Exibi o usuário conforme {id} existente
     */
    public function show($id)
    {

        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Usuário não encontrado.',
                ], 404);
            }
    
            return response()->json([
                'status'  => true,
                'message' => 'Usuário encontrado!',
                'data'    => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message"   => "Ocorreu um erro inesperado, verifique os dados e tente novamente.",
            ]);
        }

    }

    /**
     * Atualiza usuário específico, validando os dados enviado
     * e respeitando os dados únicos.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update($request->all());

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Falha ao atualizar usuário.',
                ], 404);
            }
    
            return response()->json([
                'status'  => true,
                'message' => 'Usuário atualizado!',
                'data'    => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message"   => "Ocorreu um erro inesperado, verifique os dados e tente novamente.",
            ]);
        }
    }

    /**
     * Deleta usuário baseado no {id}
     */
    public function delete($id)
    {

        try {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Usuário deletado com sucesso!',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Falha ao deletar usuário.',
            ], 404);
        }

    }
}
