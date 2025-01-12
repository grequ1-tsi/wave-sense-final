<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movimento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class MovimentoController extends Controller
{
    public function index()
    {
        return response()->json(Movimento::all());
    }

    private function checkItemMovement($item)
    {
        $movimentos = Movimento::where('item', $item)->orderBy('date', 'desc')->orderBy('time', 'desc')->get();

        if ($movimentos[0]->status == 'saida') {
            return 'Out';
        }if($movimentos[0]->status == 'entrada'){
            return 'In';
        }else{
            return 'Out';
        }

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statusHttp = 201;
        try{
            $json = $request->json()->all();;
            if (!is_array($json)) {
                return response()->json(['error' => 'Formato de JSON inválido'], 400);
            }
            $local = '147B';
            $item = $json['item'];
            $datetime = $json['datetime'];
            $CarbDate = Carbon::parse($datetime);
            $date = $CarbDate->toFormattedDateString();
            $time = $CarbDate->toTimeString();
            $status = $this->checkItemMovement($item);
            //return Log::info(print_r($time, true));
$Movimento = Movimento::create([
                'local' => $local,
                'item' => $item,
                'date' => $date,
                'time' => $time,
                'status' => $status
            ]);
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
