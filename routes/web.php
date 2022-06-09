<?php


use App\Http\Controllers\payment\MpesaPaymentController;
use App\Http\Controllers\payment\PaypalPaymentController;
use App\Http\Livewire\Admin\HomeComponent;
use App\Http\Livewire\Admin\ManageAdmins;
use App\Http\Livewire\Admin\UserDetails;
use App\Http\Livewire\Dashboard\DashboardComponent;
use App\Http\Livewire\Dashboard\DonationsComponent;
use App\Http\Livewire\Dashboard\NotificationsComponent;
use App\Http\Livewire\Dashboard\SettingsComponent;
use App\Http\Livewire\Dashboard\TransactionsComponent;
use App\Http\Livewire\Dashboard\WalletComponent;
use App\Http\Livewire\Donate;
use Illuminate\Http\Request;
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
    Route::middleware(['twofactor'])->prefix('dashboard')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
            ->name('home');
        Route::get('/', DashboardComponent::class)
            ->name('dashboard');
        Route::get('/wallet', WalletComponent::class)
            ->name('wallet');
        Route::get('/donations', DonationsComponent::class)
            ->name('donations');
        Route::get('/notifications', NotificationsComponent::class)
            ->name('notifications');
        Route::get('/transactions', TransactionsComponent::class)
            ->name('transactions');
        Route::get('/settings', SettingsComponent::class)
            ->name('settings');
        Route::post('/mpesa/withdraw', [MpesaPaymentController::class, 'withdraw'])
            ->name('mpesa.withdraw');
        Route::post('/paypal/withdraw', [PaypalPaymentController::class, 'withdraw'])
            ->name('paypal.withdraw');
//        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/admin', HomeComponent::class)
                ->name('admin.home');
            Route::get('/admin/manage-user', UserDetails::class)
                ->name('admin.manage.user');
            Route::get('/admin/manage-admin', ManageAdmins::class)
                ->name('admin.manage.admin');
            Route::get('/admin/transaction-detail', ManageAdmins::class)
                ->name('admin.transactions.detail');
//        });

    });
});
Route::post('/post/post', function (Request $request){
    return $request;
})->name('post');

Route::get('/{username}', Donate::class)->name('donate');
