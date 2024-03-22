<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\incidentController;
use App\Http\Controllers\RapportMedController;
use App\Http\Controllers\SalleAttenteController;
use App\Http\Controllers\dossierMedicalController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/patient', PatientController::class);
Route::resource('/dossierMedicaux', dossierMedicalController::class);
Route::resource('/RDV', RdvController::class);
Route::resource('/salleAttente', SalleAttenteController::class);
Route::get('/rapportMed',[RapportMedController::class,'index']);
Route::post('search-record', [RapportMedController::class,'search']);
Route::get('/downloadRM/{matricule}', [RapportMedController::class,'download'])->name('downloadRM');
Route::get('/showRMed/{matricule}', [RapportMedController::class,'show']);

Route::delete('/delete-rdv/{id}', [SalleAttenteController::class,'deleteRDV'])->name('delete-rdv');


Route::post('/searchPat', [PatientController::class,'search']);
Route::post('/searchDM', [dossierMedicalController::class,'search']);
Route::post('/searchRDV', [RdvController::class,'search']);
Route::get('/download/{id}', [RdvController::class,'download'])->name('download');
