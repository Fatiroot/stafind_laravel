<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\CompanyController as AdminComController;//allias
use App\Http\Controllers\Admin\CityController as AdminCityController;//allias
use App\Http\Controllers\Admin\DomainController as AdminDomainController;//allias
use App\Http\Controllers\Admin\UserController as AdminUserController;//allias
use App\Http\Controllers\Admin\OfferController as AdminOfferController;//allias
use App\Http\Controllers\Representative\UserController as RepresentativeController;//allias
use App\Http\Controllers\Entrepreneur\UserController as EntrepreneurController;//allias
use App\Http\Controllers\Representative\OfferController as RepresentativeOfferController;//allias
use App\Http\Controllers\Entrepreneur\OfferController as EntrepreneurOfferController;//allias
use App\Http\Controllers\Representative\CompanyController as RepresentativeComController;//allias
use App\Http\Controllers\Representative\ExperienceController as RepresentativeExpController;//allias
use App\Http\Controllers\Entrepreneur\ExperienceController as EntrepreneurExpController;//allias
use App\Http\Controllers\Representative\FormationController as RepresentativeForController;//allias
use App\Http\Controllers\Entrepreneur\FormationController as EntrepreneurForController;//allias
use App\Http\Controllers\Representative\SkillController as RepresentativeSkillController;//allias
use App\Http\Controllers\Entrepreneur\SkillController as EntrepreneurSkillController;//allias
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('/', HomeController::class);





Route::resource('adminCompany', AdminComController::class);
Route::resource('adminCity', AdminCityController::class);
Route::resource('adminOffer', AdminOfferController::class);
Route::put('/admin/{offerId}/change-status', [AdminOfferController::class, 'changeStatus'])->name('admin.changeStatus');
Route::resource('adminDomain', AdminDomainController::class);
Route::resource('adminUser', AdminUserController::class);
Route::put('adminUser', [AdminUserController::class,'updateStatus'])->name('updateStatus');



Route::resource('representative', RepresentativeController::class);
Route::put('/representative/{userId}/change-status', [RepresentativeController::class, 'changeStatus'])->name('representative.changeStatus');
Route::get('/representativeEntr', [RepresentativeController::class, 'entrepreneur'])->name('representativeEntr');
Route::resource('representativeCompany', RepresentativeComController::class);
Route::resource('representativeOffer', RepresentativeOfferController::class);
Route::resource('representativeExperience', RepresentativeExpController::class);
Route::resource('representativeFormation', RepresentativeForController::class);
Route::resource('representativeSkill', RepresentativeSkillController::class);



Route::resource('entrepreneur', EntrepreneurController::class);
Route::resource('entrepreneurOffer', EntrepreneurOfferController::class);
Route::resource('entrepreneurExperience', EntrepreneurExpController::class);
Route::resource('entrepreneurFormation', EntrepreneurForController::class);
Route::resource('entrepreneurSkill', EntrepreneurSkillController::class);
