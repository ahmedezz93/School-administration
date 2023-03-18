<?php

use App\Http\Controllers\the_parent_dashboard\ParentDashboardController;
use App\Http\Controllers\the_parent_dashboard\ProfileParentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:the_parent' ]
    ], function(){

        Route::get('parent/dashboard',[ParentDashboardController::class,'index'])->name('parent/dashboard');
        Route::get('list_childs',[ParentDashboardController::class,'list_childs'])->name('list_childs');
        Route::get('degrees_childs/{id}',[ParentDashboardController::class,'degrees_childs'])->name('degrees_childs');
        Route::get('attendance_childs',[ParentDashboardController::class,'attendance_childs'])->name('attendance_childs');
        Route::post('search_attendance',[ParentDashboardController::class,'search_attendance'])->name('search_attendance');
        Route::get('childs_accounts',[ParentDashboardController::class,'childs_accounts'])->name('childs_accounts');
        Route::get('details_childs_accounts/{id}',[ParentDashboardController::class,'details_account'])->name('details_childs_accounts');
//----------------------------------------------profile-----------------------------------------------------------
Route::get('profile_parent',[ProfileParentController::class,'index'])->name('profile_parent');
Route::post('update_profile_parent',[ProfileParentController::class,'update'])->name('update_profile_parent');





    });
