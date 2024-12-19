<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        //print_r($request);

         try{
             $user = User::where('email',$request->email)->first();

             if(!$user || ! Hash::check(
                         $request->password,
                         $user->password))
                 throw new Exception('Dados inválidos!!!');

             $token  = $user->createToken($request->email)->plainTextToken;
             return response()->json(['token'=>$token]);

         }catch(Exception $error){
             return $this->errorHandler('Erro ao efetuar login!!!', $error,403);
         }
    }
    private function errorHandler(string $message, Exception $error, int $statusHttp)
    {
        $responseError = [
            'message' => $message,
        ];

        $statusHttp = 501;

        if (env('APP_DEBUG'))
            $responseError = [
                ...$responseError,
                'error' => $error->getMessage(),
                'trace' => $error->getTrace()
            ];

        return response()->json($responseError, $statusHttp);
    }
}
