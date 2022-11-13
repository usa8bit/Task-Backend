<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// method get
Route::get('/animals', [AnimalController::class, 'index']);

// method post
Route::post('/animals', [AnimalController::class, 'store']);

// method put
Route::put('/animals/{id}', [AnimalController::class, 'update']);

// method delete
Route::delete('/animals/{id}', [AnimalController::class, 'delete']);

// pertemuan 5
// membuat route student dengan method get
Route::get('/students', [StudentController::class, 'index'])->middleware('auth:sanctum');

// membuat route student dengan method post
Route::post('/students', [StudentController::class, 'store'])->middleware('auth:sanctum');

// membuat route student dengan method put
// Route::put('/students/{id}', [StudentController::class, 'update']);

// membuat route student dengan method delete
// Route::delete('/students/{id}', [StudentController::class, 'delete']);

// pertemuan 6
// mendapatkan detail resource student
Route::get('/students/{id}', [StudentController::class, 'show'])->middleware('auth:sanctum');

// update resource student
Route::put('/students/{id}', [StudentController::class, 'update'])->middleware('auth:sanctum');

// delete resource student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->middleware('auth:sanctum');

// pertemuan 7
// membuat route register & login
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);