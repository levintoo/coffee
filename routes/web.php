<?php


use App\Http\Livewire\Dashboard\DashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TwoFactorComponent;

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

Auth::routes();
Route::post('/login-authenticate', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])
    ->name('login.authentication.manual');
Route::middleware('auth')->group(function () {
    Route::get('/twofactor', TwoFactorComponent::class)
        ->name('twofactor');
    Route::middleware(['twofactor'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
            ->name('home');
        Route::get('/dashboard', DashboardComponent::class)
            ->name('dashboard');
    });
});
