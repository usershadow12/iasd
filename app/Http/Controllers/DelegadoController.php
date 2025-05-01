<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use Illuminate\Http\Request;

class DelegadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delegados = Delegado::paginate(10);
        $data = [
            'status' => 'sucesso',
            'message' => 'Dados encontrados',
            'data' => $delegados
        ];
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $delegado = $request->all();
        Delegado::create($delegado);
        $data = [
            'status' => 'sucesso',
            'message' => 'Dados Inseridos',
            'data' => $delegado
        ];
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $delegado = Delegado::find($id);
        if(!$delegado){
            $data = "Não Encontrado";
            $data = [
                'status' => 'failed',
                'message' => 'Dados Não encontrado',
                'data' => ''
            ];
            return response()->json($data, 404);
        }else{
            $data = [
                'status' => 'sucesso',
                'message' => 'Dados encontrados',
                'data' => $delegado
            ];
            return response()->json($data, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $delegado = Delegado::find($id);
        if(!$delegado){
            $data = [
                'status' => 'failed',
                'message' => 'Dados Não encontrado',
                'data' => ''
            ];
            return response()->json($data, 404);
        }else{
            $delegado->update($request);
            $data = [
                'status' => 'sucesso',
                'message' => 'Dados encontrados',
                'data' => $delegado
            ];
            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delegado = Delegado::find($id);
        if(!$delegado){
            $data = [
                'status' => 'failed',
                'message' => 'Dados Não encontrado',
                'data' => ''
            ];
            return response()->json($data, 404);
        }else{
            $data = [
                'status' => 'sucesso',
                'message' => 'Dados Deletado',
                'data' => $delegado
            ];
            $delegado->delete();
            return response()->json($data, 200);
        }
        return response()->json($data);
    }
}
