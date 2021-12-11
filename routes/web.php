<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;

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
})->name('welcome');


Route::get('/sign-in-google', [UserController::class, 'google'])
->name('user.login.google');

Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])
->name('user.google.callback');




// Route::get('/checkout/{camp:slug}', function () {
//     return view('checkout');
// })->name('checkout');;
Route::middleware(['auth'])->group(function()
    {
Route::get('checkout/success', [CheckoutController::class, 'success'])
->name('checkout.success');
Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])
->name('checkout.create');
Route::post('checkout/{camp}', [CheckoutController::class, 'store'])
->name('checkout.store');


Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])
->name('user.checkout.invoice');
// Route::get('/success-checkout', function () {
//     return view('success_checkout');
// })->name('success-checkout');;

Route::get('dashboard', [HomeController::class, 'dashboard'])
->name('dashboard');


Route::prefix('user/dashboard')->namespace('User')->name('user.')->group(function(){
    Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');  
});


Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->group(function(){
Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
 //admin checkout
 Route::post('checkout/{checkout}', [AdminCheckout::class, 'update'])->name('checkout.update');
});

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
