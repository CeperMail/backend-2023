<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
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

//menampilkan seluruh nama hewan
Route::get('/animals', [AnimalController::class,'index']);

//route untuk menambahkan nama hewan
Route::post('/animals', [AnimalController::class,'store']);

//route untuk mengedit nama hewan
Route::put('/animals/{id}', [AnimalController::class,'update']);

//route untuk menghapus nama hewan
Route::delete('/animals/{id}', [AnimalController::class,'destroy']);



//menampilkan seluruh student
Route::get('/students',[StudentController::class, 'index']);

//menambahkan data student
Route::post('/students', [StudentController::class,'store']);

//update data student
Route::put('/students/{id}', [StudentController::class,'update']);

//hapus data student
Route::delete('/students/{id}', [StudentController::class,'destroy']);