<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\HeartBeatController;
use App\Http\Controllers\ContactInformationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/heartbeat', HeartBeatController::class);

Route::get('/contacts', [ContactController::class, 'index']);

Route::get('/contacts/getByLocation', [ContactController::class, 'getByLocation']);
Route::get('/contacts/getLocationInfoReport', [ContactController::class, 'getLocationInfoReport']);

Route::post('/contacts', [ContactController::class, 'create']);

Route::get('/contacts/{id}', [ContactController::class, 'show']);

Route::put('/contacts/{id}', [ContactController::class, 'update']);

Route::delete('/contacts/{id}', [ContactController::class, 'delete']);

Route::post('/contacts/{id}/info/add', [ContactInformationController::class, 'create']);
Route::delete('contact/info/{id}', [ContactInformationController::class, 'delete']);
