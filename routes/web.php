<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientDocumentController;
use App\Http\Controllers\Client\ClientProjectController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\Organization\OrganizationClientController;
use App\Http\Controllers\Organization\OrganizationDocumentController;
use App\Http\Controllers\Organization\OrganizationProjectController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectDocumentController;
use App\Http\Controllers\Project\ProjectTaskController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\RolePermissionController;
use App\Http\Controllers\Role\RoleUserController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Task\TaskDocumentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProjectController;
use App\Http\Controllers\User\UserTaskController;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('users.projects', UserProjectController::class)->only(['index']);
    Route::resource('users.tasks', UserTaskController::class)->only(['index']);

    Route::resource('clients', ClientController::class);
    Route::resource('clients.projects', ClientProjectController::class)->only(['index']);
    Route::resource('clients.documents', ClientDocumentController::class)->only(['index', 'store']);

    Route::resource('organizations', OrganizationController::class);
    Route::resource('organizations.clients', OrganizationClientController::class)->only(['index']);
    Route::resource('organizations.projects', OrganizationProjectController::class)->only(['index']);
    Route::resource('organizations.documents', OrganizationDocumentController::class)->only(['index', 'store']);

    Route::resource('projects', ProjectController::class);
    Route::resource('projects.tasks', ProjectTaskController::class)->only(['index']);
    Route::resource('projects.documents', ProjectDocumentController::class)->only(['index', 'store']);

    Route::resource('tasks', TaskController::class);
    Route::resource('tasks.documents', TaskDocumentController::class)->only(['index', 'store']);

    Route::resource('documents', DocumentController::class)->only(['show', 'update', 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::resource('roles.permissions', RolePermissionController::class)->only(['index']);
    Route::resource('roles.users', RoleUserController::class)->only(['index']);
});

