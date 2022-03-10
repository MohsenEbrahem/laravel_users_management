<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\DeleteUserController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/post',PostController::class)->middleware('auth');
Route::get('/assign-role', [AssignRoleController::class, 'AssignRole'])->middleware('checkadminrole');
Route::get('/delete-user',[DeleteUserController::class,'DeleteUser'])->middleware('checkadminrole');