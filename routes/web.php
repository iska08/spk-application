<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LandingPagesController;
use App\Http\Controllers\AdminCriteriaController;
use App\Http\Controllers\DashboardRankController;
use App\Http\Controllers\AdminAlternativeController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\AdminTourismObjectController;
use App\Http\Controllers\DashboardCriteriaComparisonController;

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

Route::get('/', [LandingPagesController::class, 'index']) -> name('home');
Route::get('/course', [LandingPagesController::class, 'course']) -> name('course');
Route::get('/statistics', [LandingPagesController::class, 'statistics']) -> name('statistics');
Route::get('/feature', [LandingPagesController::class, 'feature']) -> name('features');
Route::get('/system-spk', [LandingPagesController::class, 'systemSpk']) -> name('system-spk');
Route::get('/contact', [LandingPagesController::class, 'contact']) -> name('contact');


Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::post('/login', [AuthController::class, 'authenticate']);
  Route::get('/signup', [AuthController::class, 'signUp']);
  Route::post('/signup', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
  Route::get('/signout', [AuthController::class, 'signOut']);

  Route::get('/dashboard', function () {
    return view('dashboard.index', [
      'title' => 'Dashboard'
    ]);
  });

  Route::get('dashboard/profile', [DashboardProfileController::class, 'index']);
  Route::put('dashboard/profile/{user}', [DashboardProfileController::class, 'update']);

  Route::get('dashboard/criteria-comparisons', [DashboardCriteriaComparisonController::class, 'index']);
  Route::post('dashboard/criteria-comparisons', [DashboardCriteriaComparisonController::class, 'store']);

  Route::get('dashboard/criteria-comparisons/{criteria_analysis}', [DashboardCriteriaComparisonController::class, 'show']);

  Route::put('dashboard/criteria-comparisons/{criteria_analysis}', [DashboardCriteriaComparisonController::class, 'updateValue']);

  Route::delete('dashboard/criteria-comparisons/{criteria_analysis}', [DashboardCriteriaComparisonController::class, 'destroy']);

  Route::get('dashboard/criteria-comparisons/result/{criteria_analysis}', [DashboardCriteriaComparisonController::class, 'result']);

  Route::get('dashboard/final-ranking', [DashboardRankController::class, 'index']);
  Route::get('dashboard/final-ranking/{criteria_analysis}', [DashboardRankController::class, 'show']);

  Route::resources([
    'dashboard/tourism-objects' => AdminTourismObjectController::class,
    'dashboard/criterias'       => AdminCriteriaController::class,
    'dashboard/users'           => AdminUserController::class,
    'dashboard/alternatives'    => AdminAlternativeController::class
  ], ['except' => 'show']);
});

// Testing
Route::get('/testing', function () {
    return view('layouts.main2');
});
