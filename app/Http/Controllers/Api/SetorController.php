<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setor;
use Exception;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        return response()->json(Setor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statusHttp = 201;
        try{
            $Setor = Setor::create($request->all());
            return response()->json(['Message' => 'Setor registrado com sucesso', 'Setor' => $Setor], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao registrar o Setor', $e,$statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Setor $Setor)
    {
        return response()->json($Setor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setor $Setor)
    {
        $statusHttp = 200;
        try{
            $info = $request->all();
            $Setor->update($info);
            return response()->json(['Message' => 'Setor atualizado', 'Setor' => $Setor], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao atualizar o Setor', $e, $statusHttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setor $Setor)
    {
        $statusHttp = 200;
        try {
            $Setor->delete();
            return response()->json([
                'message' => 'Setor removido com sucesso',
                'data' => $Setor
            ], $statusHttp);
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao remover o Setor!!!', $error, $statusHttp);
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
