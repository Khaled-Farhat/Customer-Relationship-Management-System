<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientDocumentController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\Organization\OrganizationClientController;
use App\Http\Controllers\Organization\OrganizationDocumentController;
use App\Http\Controllers\User\UserController;
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

Route::redirect('/', 'login');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::resource('users', UserController::class);

    Route::resource('organizations', OrganizationController::class);
    Route::resource('organizations.clients', OrganizationClientController::class)->only(['index']);
    Route::resource('organizations.documents', OrganizationDocumentController::class)->only(['index', 'store']);

    Route::resource('clients', ClientController::class);
    Route::resource('clients.documents', ClientDocumentController::class)->only(['index', 'store']);

    Route::resource('documents', DocumentController::class)->only(['show', 'update', 'destroy']);
});

