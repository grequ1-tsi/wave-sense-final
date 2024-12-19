<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemPatrimonial;
use Exception;
use Illuminate\Http\Request;

class ItemPatrimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(ItemPatrimonial::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statusHttp = 201;
        try{
            $ItemPatrimonial = ItemPatrimonial::create($request->all());
            return response()->json(['Message' => 'ItemPatrimonial registrado com sucesso', 'ItemPatrimonial' => $ItemPatrimonial], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao registrar o ItemPatrimonial', $e,$statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemPatrimonial $ItemPatrimonial)
    {
        return response()->json($ItemPatrimonial);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemPatrimonial $ItemPatrimonial)
    {
        $statusHttp = 200;
        try{
            $info = $request->all();
            $ItemPatrimonial->update($info);
            return response()->json(['Message' => 'ItemPatrimonial atualizado', 'ItemPatrimonial' => $ItemPatrimonial], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao atualizar o ItemPatrimonial', $e, $statusHttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemPatrimonial $ItemPatrimonial)
    {
        $statusHttp = 200;
        try {
            $ItemPatrimonial->delete();
            return response()->json([
                'message' => 'ItemPatrimonial removido com sucesso',
                'data' => $ItemPatrimonial
            ], $statusHttp);
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao remover o ItemPatrimonial!!!', $error, $statusHttp);
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
