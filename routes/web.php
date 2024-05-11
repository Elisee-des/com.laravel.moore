<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\public\AuthController;
use App\Http\Controllers\public\PublicController;
use App\Http\Controllers\private\admin\UserController;
use App\Http\Controllers\private\admin\LessonController;
use App\Http\Controllers\private\admin\ProfilController;
use App\Http\Controllers\private\admin\TableauBordController;
use App\Http\Controllers\private\user\MesLessonController;
use App\Http\Controllers\private\user\SelectLessonController;
use App\Http\Controllers\private\user\UserTableauBordController;


Route::get('/', [PublicController::class, "index"])->name("public.index");
Route::get('/profil', [ProfilController::class, "profil"])->name("private.admin.profil");
Route::get('/liste-user', [UserController::class, "liste"])->name("private.admin.list.liste");
//  Route::get('/utilisateur', [tableauBordController::class, "utilisateur"])->name("admin.list_utilisateur");

#Auth Controller
Route::get('/inscription', [AuthController::class, 'inscription'])->name('public.inscription');
Route::post('/inscription/action', [AuthController::class, 'inscriptionAction'])->name('public.inscription-action');
Route::get('/connexion', [AuthController::class, 'connexion'])->name('public.connexion');
Route::post('/connexion/action', [AuthController::class, 'connectionAction'])->name('public.connexion-action');
Route::post('/deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');
#End Auth Controller

################################ Private parts #################################
#Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-tableau-de-bord', [TableauBordController::class, "index"])->name("admin.tableauBord");
    Route::get('/ajout-mot-moore/{idLesson}', [LessonController::class, "ajoutMotMoore"])->name("ajout-mot-moore");
    Route::post('/ajout-mot-moore/{idLesson}/action', [LessonController::class, "ajoutMotMooreAction"])->name("ajout-mot-moore-action");
    Route::get('/edit-mot-moore/{idMotMoore}', [LessonController::class, "editMotMoore"])->name("edit-mot-moore");
    Route::put('/edit-mot-moore/{idMotMoore}/action', [LessonController::class, "editMotMooreAction"])->name("edit-mot-moore-action");
    Route::delete('/delete-mot-moore/{idMotMoore}/action', [LessonController::class, "deletetMotMooreAction"])->name("delete-mot-moore-action");
    Route::resource('lessons', LessonController::class);
    Route::resource('users', UserController::class);
});


#Public routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-tableau-de-bord', [UserTableauBordController::class, "index"])->name("user.tableauBord");
    Route::get('/selectionner-des-lessons', [SelectLessonController::class, "index"])->name("selection-lesson");
    Route::post('/selectionner-des-lessons/action', [SelectLessonController::class, "selectionAction"])->name("selection-lesson-action");
    Route::get('/mes-lessons', [MesLessonController::class, "index"])->name("mes-lessons");
    Route::get('/deselectionner-des-lessons/action/{idLesson}', [MesLessonController::class, "deselectionAction"])->name("deselection-lesson-action");
    Route::get('/apprentissage-index/{idLesson}', [MesLessonController::class, "apprentissageLesson"])->name("apprentissage-index");
});