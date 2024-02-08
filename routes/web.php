<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BranchesController;
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
Auth::routes(['verify' => true]);


    Route::get('/sign-in', [WebController::class, 'signIn'])->name('sign-in');
    Route::middleware(['auth'])->group(function () {

        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/', [WebController::class, 'index'])->name('index');

        Route::middleware(['verified'])->group(function () {
                // Place your verified-user-only routes here

        });
        
            Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
            Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
            Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
            Route::put('/users/edit/{id}', [UsersController::class, 'update'])->name('users.update');
            Route::delete('/users/delete/{id}',  [UsersController::class, 'destroy'])->name('users.destroy');
    });
        Auth::routes();
        // Route::post('/user/notification/read/{notification}', [UsersController::class, 'markNotificationAsRead'])->name('user.notification.read');
        Route::get('/get-income-data',[BranchesController::class, 'getIncomeData']);


        