<?php
use App\Http\Controllers\MeasurementsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Página inicial
Route::get('/', function () {
    return view('measurements/home');
});

//Rota que abre a lista de medidas cadastradas
Route::get('/measurements', [MeasurementsController::class,'index']);

//Rota que abre o formulário para cadastrar uma nova medida
Route::get('/measurements/new', function () {
    return view('measurements/form');
});

//Rota que salva no banco de dados uma nova medida
Route::post('/measurements/new',[MeasurementsController::class,'store']);

//Rota que exclui uma medida no banco de dados
Route::delete('/measurements/{id}',[MeasurementsController::class,'destroy']);

//Rota que abre o formulário para editar uma medida
Route::get('/measurements/edit/{id}',
           [MeasurementsController::class,'show']);

//Rota que altera uma medida no banco de dados
Route::put('/measurements/{id}',
          [MeasurementsController::class,'update']);
