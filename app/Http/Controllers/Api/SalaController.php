<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sala;
use Exception;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Sala::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statusHttp = 201;
        try{
            $Sala = Sala::create($request->all());
            return response()->json(['Message' => 'Sala registrado com sucesso', 'Sala' => $Sala], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao registrar o Sala', $e,$statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sala $Sala)
    {
        return response()->json($Sala);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sala $Sala)
    {
        $statusHttp = 200;
        try{
            $info = $request->all();
            $Sala->update($info);
            return response()->json(['Message' => 'Sala atualizado', 'Sala' => $Sala], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao atualizar o Sala', $e, $statusHttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sala $Sala)
    {
        $statusHttp = 200;
        try {
            $Sala->delete();
            return response()->json([
                'message' => 'Sala removido com sucesso',
                'data' => $Sala
            ], $statusHttp);
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao remover o Sala!!!', $error, $statusHttp);
        }
    }

    private function errorHandler(string $message, Exception $error, int $statusHttp)
    {
        $responseError = [
            'message' => $message,
        ];

        $statusHttp = 500;

        if (env('APP_DEBUG'))
            $responseError = [
                ...$responseError,
                'error' => $error->getMessage(),
                'trace' => $error->getTrace()
            ];

        return response()->json($responseError, $statusHttp);
    }
}
