<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\User;

class UserController extends Controller
{
    /**
     * 
     * Exibe uma lista do recursos com todos os usuários
     * 
     */
    public function index()
    {
      
        if(request()->deleted === 1){
            $user = User::onlyTrashed()->get();;
        }else{
            $user = User::all();
        }
        return $user;
    }
    /**
     * 
     * Realiza criação de um novo usuário
     * 
     */
    public function store(Request $request)
    {
        try {
            $user = User::insert([$request->input()]);

            return response()->json([
                'user' => $user
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'erro' => $e
            ], 401);
        }
        
    }
    public function show($id)
    {
        return User::find($id);
    }   
    /**
     * 
     * Realiza o edite de um usuário com base no id informado
     * 
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        try {
            $input = $request->all();
            $user->fill($input)->save();

            return response()->json([
                'user' => $user
            ], 200);

        } catch (\Throwable $e) {

            return response()->json([
                'erro' => $e
            ], 401);
        }
    }
    /**
     * 
     * Realiza o delete lógico de um usuário
     * Para esse recurso é utilizado o SoftDeletes 
     * com base em um id de usuário informado.
     * 
     */
    public function delete($id)
    {
        $user = User::find($id);
        try {

            $user->delete();

            return response()->json([
                'user' => $user
            ], 200);

        } catch (\Throwable $e) {

            return response()->json([
                'erro' => $e
            ], 401);
        } 
    }
    /**
     * 
     * Realiza o restore do um usuário deletado
     * com base em um id informado. Esse procedimento
     * conta com o SoftDeletes para habilitar o usuário 
     * no sistema
     * 
     */
    public function restore($id)
    {
        $user = User::find($id);

        try {

            $user = User::withTrashed()->find($id)->restore();

            return response()->json([
                'user' => $user
            ]);

        } catch (\Throwable $e) {
            
            return response()->json([
                'erro' => $e
            ], 401);

        }
    }
}
