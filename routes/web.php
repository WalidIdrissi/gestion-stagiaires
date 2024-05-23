<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\EncadrantController;
use App\Http\Controllers\TravauxController;
use App\Http\Controllers\RapporteController;
use App\Http\Controllers\EvaluationController;



Route::get('/home', function () {return view('home');})->name('home');

//index
Route::get('/', function () {return view('login');});

Route::prefix('admin')->middleware('auth')->group(function(){

//home
Route::get('/home', function () {
    return view('home');
})->name('home');

//demandestage
Route::get('/demande', DemandeController::class .'@index')->name('demande.index');
Route::get('/demande/create', DemandeController::class . '@create')->name('demande.create');
Route::put('/demande/{demande}', DemandeController::class .'@update')->name('demande.update');
Route::get('/demande/{demande}/edit', DemandeController::class .'@edit')->name('demande.edit');
Route::delete('/demande/{demande}', DemandeController::class .'@destroy')->name('demande.destroy');
Route::post('/demande', DemandeController::class .'@store')->name('demande.store');
Route::get('/demande/{demande}', DemandeController::class .'@show')->name('demande.show');
Route::post('/demande/{id}/validate', [DemandeController::class, 'validateDemande'])->name('demande.validate');


//stagiaire
Route::get('/stagiaire', StagiaireController::class .'@index')->name('stagiaire.index');
Route::get('/stagiaire/create/', StagiaireController::class . '@create')->name('stagiaire.create');
Route::put('/stagiaire/{stagiaire}', StagiaireController::class .'@update')->name('stagiaire.update');
Route::get('/stagiaire/{stagiaire}/edit', StagiaireController::class .'@edit')->name('stagiaire.edit');
Route::delete('/stagiaire/{stagiaire}', StagiaireController::class .'@destroy')->name('stagiaire.destroy');
Route::post('/stagiaire', StagiaireController::class .'@store')->name('stagiaire.store');
Route::get('/stagiaire/{stagiaire}', StagiaireController::class .'@show')->name('stagiaire.show');


//encadrant
Route::get('/encadrant', EncadrantController::class .'@index')->name('encadrant.index');
Route::get('/encadrant/create/', EncadrantController::class . '@create')->name('encadrant.create');
Route::put('/encadrant/{encadrant}', EncadrantController::class .'@update')->name('encadrant.update');
Route::get('/encadrant/{encadrant}/edit', EncadrantController::class .'@edit')->name('encadrant.edit');
Route::delete('/encadrant/{encadrant}', EncadrantController::class .'@destroy')->name('encadrant.destroy');
Route::post('/encadrant', EncadrantController::class .'@store')->name('encadrant.store');

//travaux
Route::get('/travaux', TravauxController::class .'@index')->name('travaux.index');
Route::get('/travaux/create/', TravauxController::class . '@create')->name('travaux.create');
Route::put('/travaux/{travaux}', TravauxController::class .'@update')->name('travaux.update');
Route::get('/travaux/{travaux}/edit', TravauxController::class .'@edit')->name('travaux.edit');
Route::delete('/travaux/{travaux}', TravauxController::class .'@destroy')->name('travaux.destroy');
Route::post('/travaux', TravauxController::class .'@store')->name('travaux.store');

//rapporte
Route::get('/rapporte', RapporteController::class .'@index')->name('rapporte.index');
Route::get('/rapporte/create/', RapporteController::class . '@create')->name('rapporte.create');
Route::put('/rapporte/{rapporte}', RapporteController::class .'@update')->name('rapporte.update');
Route::get('/rapporte/{rapporte}/edit', RapporteController::class .'@edit')->name('rapporte.edit');
Route::delete('/rapporte/{rapporte}', RapporteController::class .'@destroy')->name('rapporte.destroy');
Route::post('/rapporte', RapporteController::class .'@store')->name('rapporte.store');

// Évaluations de stage
Route::get('/evaluations', EvaluationController::class . '@index')->name('evaluations.index');
Route::get('/evaluations/create', EvaluationController::class .'@create')->name('evaluations.create');
Route::put('/evaluations/{evaluation}', EvaluationController::class .'@update')->name('evaluations.update');
Route::get('/evaluations/{evaluation}/edit',EvaluationController::class .'@edit')->name('evaluations.edit');
Route::delete('/evaluations/{evaluation}', EvaluationController::class .'@destroy')->name('evaluations.destroy');
Route::post('/evaluations', EvaluationController::class . '@store')->name('evaluations.store');

});
