<?php


use App\Http\Controllers\MedicamentoController;
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

Route::get('/inicio', function(){
    return view('inicio');

});

Route::get('/', function () {
    return view('inicio');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('medicamento/{medicamento}/agrega-responsable', [MedicamentoController::class, 'agregaResponsable'])->name('medicamento.agrega-responsable');
Route::resource('medicamento', MedicamentoController::class)->middleware('auth');