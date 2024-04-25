<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\CompanyController as AdminComController;
use App\Http\Controllers\Admin\CityController as AdminCityController;
use App\Http\Controllers\Admin\DomainController as AdminDomainController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OfferController as AdminOfferController;
use App\Http\Controllers\Representative\UserController as RepresentativeController;
use App\Http\Controllers\Entrepreneur\UserController as EntrepreneurController;
use App\Http\Controllers\Representative\OfferController as RepresentativeOfferController;
use App\Http\Controllers\Entrepreneur\OfferController as EntrepreneurOfferController;
use App\Http\Controllers\Representative\CompanyController as RepresentativeComController;
use App\Http\Controllers\Entrepreneur\CompanyController as EntrepreneurComController;
use App\Http\Controllers\Representative\ExperienceController as RepresentativeExpController;
use App\Http\Controllers\Representative\FormationController as RepresentativeForController;
use App\Http\Controllers\Representative\SkillController as RepresentativeSkillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserOfferController;

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



//Home Route
Route::get('about', function () {
    return view('about');
});
Route::resource('home', HomeController::class);
Route::get('companies', [HomeController::class,'allCompanies'])->name('allCompanies');
Route::get('/searchByTitle', [HomeController::class, 'searchByTitle'])->name('searchByTitle');
Route::get('/searchByCity', [HomeController::class, 'searchByCity'])->name('searchByCity');
Route::resource('UserOffer', UserOfferController::class);
Route::get('/offer/{id}/check-applied', [UserOfferController::class, 'checkApplied'])->name('offer.check-applied');







//Admin Route
Route::middleware('admin')->group(function () {
Route::resource('adminCompany', AdminComController::class);
Route::resource('adminCity', AdminCityController::class);
Route::resource('adminOffer', AdminOfferController::class);
Route::resource('adminDomain', AdminDomainController::class);
Route::resource('adminUser', AdminUserController::class);
Route::get('adminDashboard', [AdminUserController::class,'showStatistic'])->name('showStatistic');
Route::put('adminUser/{Id}/change-status', [AdminUserController::class, 'changeStatus'])->name('admin.changeStatus');
Route::put('adminOffer/{Id}/change-status', [AdminOfferController::class, 'changeStatus'])->name('adminOffer.changeStatus');
});



//Representative Route
Route::middleware('representative')->group(function () {
Route::resource('representative', RepresentativeController::class);
Route::put('/representative/{userId}/change-status', [RepresentativeController::class, 'changeStatus'])->name('representative.changeStatus');
Route::get('/representativeEntr', [RepresentativeController::class, 'entrepreneur'])->name('representativeEntr');
Route::resource('representativeCompany', RepresentativeComController::class);
Route::resource('representativeOffer', RepresentativeOfferController::class);
Route::get('/requestsRep/{offerId}', [RepresentativeOfferController::class, 'getRequests'])->name('requestsRep');
Route::put('/requests/{Id}/change-status', [RepresentativeOfferController::class, 'changeStatus'])->name('RequestchangeStatus');
});

//Crud of Experience/Formation/Skills
Route::resource('representativeExperience', RepresentativeExpController::class);
Route::resource('representativeFormation', RepresentativeForController::class);
Route::resource('representativeSkill', RepresentativeSkillController::class);

//Entrepreneur Route
Route::middleware('entrepreneur')->group(function () {
Route::resource('entrepreneur', EntrepreneurController::class);
Route::resource('entrepreneurCompany', EntrepreneurComController::class);
Route::resource('entrepreneurOffer', EntrepreneurOfferController::class);
Route::get('/requestsEntr/{offerId}', [EntrepreneurOfferController::class, 'getRequests'])->name('requestsEntr');
});
