<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuestionnairController;
use App\Http\Controllers\OrganizationCoontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Organization;

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
    return view('auth/login');
});


Route::get('allQuestionnaire/questionnaire/{id}/{organization_id}/{slug}', [QuestionnairController::class, 'index']);
Route::get('allQuestionnaire/questionnaire_3/{id}/{organization_id}/{slug}', [QuestionnairController::class, 'questionnaire_3']);

Route::middleware([Organization::class])->group(function () {
    
    
    Route::post('organization', [OrganizationCoontroller::class, 'store'])->name('organization');
    Route::post('questionnaire', [QuestionnairController::class, 'store'])->name('questionnaire');
    Route::post('questionnaire/organization_update/{id}', [OrganizationCoontroller::class, 'update'])->name('organization.update');
    
    Route::get('table/{id}', [QuestionnairController::class, 'edit']);
    Route::post('table_update/{id}', [QuestionnairController::class, 'update'])->name('table.update');
    Route::get('table_delete/{id}', [QuestionnairController::class, 'destroy']);
    });
Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/organization/{id}', [AdminController::class, 'organization'])->name('organization/{id}');

Route::get('profile', [ProfileController::class, 'interviewerProfile']);
Route::post('profile', [ProfileController::class, 'addInterviewerProfile'])->name('interviewer.profile');