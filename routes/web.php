<?php

use Illuminate\Support\Facades\Route;

/* Controller load */
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/* Custom fortify load*/
use App\Http\Controllers\Auth\LoginController;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/bo')->group(function () {
    //Login routes
    $limiter = config('fortify.limiters.login');
    Route::get('/', function() {
        return redirect('/bo/login');
    });
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware(['guest:'.config('fortify.guard')])
        ->name('login');
    Route::post('/login', [LoginController::class, 'store'])
        ->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $limiter ? 'throttle:'.$limiter : null,
        ]));
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Route::middleware('auth')->group(function () {
        //Page routes
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        //User management
        Route::post('/user/table', [UserController::class, 'table'])->name('user.table');
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::post('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        // Route::resource('user', UserController::class);
        // Route::middleware('role.check')->group(function () {
        //     Route::resource('user', UserController::class);
        // });
    // });
});
