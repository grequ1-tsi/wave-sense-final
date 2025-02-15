<?php

namespace App\Http\Controllers\Api;

//use App\Events\ItemMovimentado;
use App\Http\Controllers\Controller;
use App\Models\Movimento;
use App\Models\Sala;
use App\Models\Setor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
//use Filament\Forms\Components\Livewire;
use Livewire\Livewire;

class MovimentoController extends Controller
{
    public function index()
    {
        return response()->json(Movimento::all());
    }

    private function checkItemMovement($item)
    {
        $movimentos = Movimento::where('num_patrimonial', $item)->orderBy('data', 'desc')->orderBy('horario', 'desc')->get();

        if($movimentos->isEmpty()){
            return 'OUT';
        }
        if($movimentos->first()->status == 'OUT') {
            return 'IN';
        }else
        if($movimentos->first()->status == 'IN'){
            return 'OUT';
        }

    }


    private function getSala($local)
    {
        $sala = Sala::where('numSala', $local)->first();
        if ($sala) {
            return $sala->id;
        }
        
        return "ERRO! A Sala não existe!";

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statusHttp = 201;
        try{
            //return Log::info('request', $request->all());
            $json = $request->json()->all();
  //          return Log::info('json', $json);
            if (!is_array($json)) {
                return response()->json(['error' => 'Formato de JSON inválido'], 400);
            }
            $local = $json['local'];
            $item = $json['item'];
            $datetime = $json['datetime'];
            $CarbDate = Carbon::parse($datetime);
            $date = $CarbDate->toDateString();
            $time = $CarbDate->toTimeString();
            $salas_id = $this->getSala($local);
            $status = $this->checkItemMovement($item);
            //return Log::info($status);
            $salas_id = $this->getSala($local);
            //return Log::info($salas_id);
            $Movimento = Movimento::create([
                'num_patrimonial' => $item,
                'status' => $status,
                'salas_id' => $salas_id,
                'data' => $date,
                'horario' => $time,
            ]);
            //event(new ItemMovimentado());
            return response()->json(['Message' => 'Movimento registrado com sucesso', 'Movimento' => $Movimento], $statusHttp);
        }catch(Exception $e)
        {
            return $this->errorHandler('Erro ao registrar o Movimento', $e, 404);
        }
    }
    public function show(Movimento $Movimento)
    {
        return response()->json($Movimento);
    }

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
