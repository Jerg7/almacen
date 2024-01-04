<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryWarehouseController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegUserController;
use App\Http\Controllers\RequirementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('managements', ManagementController::class)->middleware('auth');

Route::resource('job_positions', JobPositionController::class)->middleware('auth');

Route::resource('users', RegUserController::class)->middleware('auth');

Route::resource('categories', CategoryController::class)->middleware('auth');

Route::resource('products', ProductController::class)->middleware('auth');

Route::resource('requirements', RequirementController::class)->middleware('auth');
Route::get('requirements/historic/{user}', [RequirementController::class, 'RequirementByManagement'])->middleware('auth');

Route::resource('providers', ProviderController::class)->middleware('auth');

Route::resource('purchases', PurchaseController::class)->middleware('auth');
Route::get('purchases/bill/{bill}', [PurchaseController::class, 'PurchasesByBill'])->middleware('auth');

Route::resource('deliveries', DeliveryWarehouseController::class)->middleware('auth');
