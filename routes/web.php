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

Route::get('/', function () {
    return view('measurements/home');
});

Route::get('/measurements', [MeasurementsController::class,'index']);

Route::get('/measurements/new', function () {
    return view('measurements/form');
});

Route::post('/measurements/new',[MeasurementsController::class,'store']);
