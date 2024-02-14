<?php

use App\Http\Controllers\PagamentoController;
use Illuminate\Support\Facades\Route;


Route::get('/pagamento', [PagamentoController::class, 'index']);
Route::post('/pagar-pix', [PagamentoController::class, 'processarPix'])->name('process.pix');
