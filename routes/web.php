<?php

use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Interaction aux années scolaires
    Route::prefix('setting')->group(function () {
        Route::get('/', [SchoolYearController::class, 'index'])->name('setting');
        Route::get('/create-school-year', [SchoolYearController::class, 'create'])->name('setting.create_school_year');
    });

    // Interaction aux niveaux
    Route::prefix('level')->group(function () {
        Route::get('/', [LevelController::class, 'index'])->name('level');
        Route::get('/create-level', [LevelController::class, 'create'])->name('level.create_level');
        Route::get('/edit-level/{level}', [LevelController::class, 'edit'])->name('level.edit_level');

        // Route::prefix('/classe/{classe}')->group(function () {
        //     Route::get('/', [LevelController::class, 'classe'])->name('classe');
        // });

        // Route::get('/create-classe', [LevelController::class, 'create_classe'])->name('niveau.classe.create_classe');
        // Route::get('/edit-classe/{classe}', [LevelController::class, 'edit_classe'])->name('niveau.classe.edit_classe');
    });

    // Interaction aux élèves
    Route::prefix('student')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('student');
        Route::get('/create', [StudentController::class, 'create'])->name('student.create');
        // Route::get('/{student}', [StudentController::class, 'show'])->name('student.show');
        Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
    });
    
    // Interaction aux années scolaires
    Route::prefix('inscription')->group(function () {
        Route::get('/', [InscriptionController::class, 'index'])->name('inscription');
        Route::get('/create', [InscriptionController::class, 'create'])->name('inscription.create');
        Route::get('/edit/{student}', [InscriptionController::class, 'edit'])->name('inscription.edit');
    });
});
