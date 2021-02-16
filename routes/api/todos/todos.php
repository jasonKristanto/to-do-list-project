<?php

use App\Http\Controllers\Todos\TodoistController;
use Illuminate\Support\Facades\Route;

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

Route::post('/', [TodoistController::class, 'index']);
Route::post('/get-todoist', [TodoistController::class, 'getTodoist']);
