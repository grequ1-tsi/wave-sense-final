<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movimento;
use Exception;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    public function index()
    {
        return response()->json(Movimento::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statusHttp = 201;
        try{
            $Movimento = Movimento::create($request->all());
            return response()->json(['Message' => 'Movimento registrado com sucesso', 'Movimento' => $Movimento], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao registrar o Movimento', $e,$statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimento $Movimento)
    {
        return response()->json($Movimento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimento $Movimento)
    {
        $statusHttp = 200;
        try{
            $info = $request->all();
            $Movimento->update($info);
            return response()->json(['Message' => 'Movimento atualizado', 'Movimento' => $Movimento], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao atualizar o Movimento', $e, $statusHttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimento $Movimento)
    {
        $statusHttp = 200;
        try {
            $Movimento->delete();
            return response()->json([
                'message' => 'Movimento removido com sucesso',
                'data' => $Movimento
            ], $statusHttp);
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao remover o Movimento!!!', $error, $statusHttp);
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
