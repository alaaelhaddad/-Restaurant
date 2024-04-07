<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderDeliveryController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



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


//order delivery
Route::post('/order-deliveries', [OrderDeliveryController::class, 'store']);
Route::get('/order-deliveries/{orderDelivery}', [OrderDeliveryController::class, 'show']);
Route::put('/order-deliveries/{orderDelivery}', [OrderDeliveryController::class, 'update']);
Route::delete('/order-deliveries/{orderDelivery}', [OrderDeliveryController::class, 'destroy']);


//order item
Route::post('/order-items', [OrderItemController::class, 'store']);
Route::get('/order-items/{orderItem}', [OrderItemController::class, 'show']);
Route::put('/order-items/{orderItem}', [OrderItemController::class, 'update']);
Route::delete('/order-items/{orderItem}', [OrderItemController::class, 'destroy']);


//order
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{order}', [OrderController::class, 'show']);
Route::put('/orders/{order}', [OrderController::class, 'update']);
Route::delete('/orders/{order}', [OrderController::class, 'destroy']);



//note
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{note}', [NoteController::class, 'show']);
Route::put('/notes/{note}', [NoteController::class, 'update']);
Route::delete('/notes/{note}', [NoteController::class, 'destroy']);



//item
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items/{item}', [ItemController::class, 'show']);
Route::put('/items/{item}', [ItemController::class, 'update']);
Route::delete('/items/{item}', [ItemController::class, 'destroy']);



//category
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::put('/categories/{category}',[CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);



//employee
Route::post('employeeregister', [employeeController::class,'register']);
Route::post('employeelogin', [employeeController::class,'login']);
Route::post('employeelogin', [employeeController::class,'logout']);

Route::group([

    'middleware' => 'auth:employee',
    'prefix' => 'auth'

], 
function ($router) { 


});



Route::group([

    'middleware' => 'auth:user',
    'prefix' => 'auth'

], function ($router) {

    Route::get('logout', [userController::class,'logout']);
    Route::get('me', [userController::class,'me']);
    Route::apiResource('order', orderController::class)->only(['index','store']);
});