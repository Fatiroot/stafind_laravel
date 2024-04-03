<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\CompanyController as AdminComController;//allias
use App\Http\Controllers\Admin\CityController as AdminCityController;//allias
use App\Http\Controllers\Admin\DomainController as AdminDomainController;//allias
use App\Http\Controllers\Admin\UserController as AdminUserController;//allias
use App\Http\Controllers\Representative\UserController as RepresentativeController;//allias


use App\Http\Controllers\Representative\CompanyController as RepresentativeComController;//allias


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
// ----------------------------Authentification ------------------------------//
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'registerView')->name('register');
    Route::post('register', 'register');
    Route::get('login', 'loginView')->name('login');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');

});


Route::get('signUp',[AuthController::class, 'SignUp'])->name('SignUp');
Route::post('register',[AuthController::class, 'register'])->name('register');

Route::get('signIn',[AuthController::class, 'SignIn'])->name('SignIn');
Route::post('login',[AuthController::class, 'login'])->name('login');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth', function () {
    return view('auth.auth');
});




Route::resource('adminCompany', AdminComController::class);
Route::resource('adminCity', AdminCityController::class);
Route::resource('adminDomain', AdminDomainController::class);
Route::resource('adminUser', AdminUserController::class);
Route::resource('representative', RepresentativeController::class);
Route::resource('representativeCompany', RepresentativeComController::class);
