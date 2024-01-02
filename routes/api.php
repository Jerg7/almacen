<?php

use App\Http\Controllers\PurchaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\RequirementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/requirement/{category}/productByCategory', [RequirementController::class, 'byCategory']);

Route::get('/purchase/provider', [PurchaseController::class, 'byProviders']);

Route::get('/purchase/product', [PurchaseController::class, 'byProducts']);

Route::get('/purchase/{provider}/productByProvider', [PurchaseController::class, 'byPurchase']);


