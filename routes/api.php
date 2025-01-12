<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ItemPatrimonialController;
use App\Http\Controllers\Api\SalaController;
use App\Http\Controllers\Api\SetorController;
use App\Http\Controllers\Api\MovimentoController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::controller(ItemPatrimonialController::class)->group(function(){
         Route::get('itens',[ItemPatrimonialController::class,'itens']);
         Route::post('itens','store');
         Route::put('itens/{item}','update');
         Route::delete('itens/{item}','destroy');
    });
    Route::controller(SalaController::class)->group(function(){
     Route::get('salas',[SalaController::class,'salas']);
     Route::post('salas','store');
     Route::put('salas/{sala}','update');
     Route::delete('salas/{sala}','destroy');
     });
     Route::controller(SetorController::class)->group(function(){
         Route::get('setores',[SetorController::class,'setores']);
         Route::post('setores','store');
         Route::put('setores/{setor}','update');
         Route::delete('setores/{setor}','destroy');
    });
 });
 Route::post('/login',[LoginController::class,'login']);
 //Route::get('/login',[LoginController::class,'login']);

 
 Route::post('/testWebhook', function () {
     return Log::info('Webhook received');
 });
 Route::post('/ubiWebhook', [MovimentoController::class, 'store']);