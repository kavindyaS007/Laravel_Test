<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserDataController;



// Route::get('/home', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::class, 'login']);
Route::post('/chklogin',[DataController::class, 'checklogin']);
Route::get('/logout',[PagesController::class, 'logout']);

//routes after login
Route::get('/admin',[PagesController::class, 'homeAdmin']);

Route::get('/user',[PagesController::class, 'homeUser']);

//routes as admin

Route::get('/admin/zoneReg',[PagesController::class, 'zoneReg']);


Route::get('/admin/regionReg',[PagesController::class, 'regionReg']);

Route::get('/admin/territoryReg',[PagesController::class, 'territoryReg']);


Route::get('/admin/userReg',[PagesController::class, 'userReg']);

Route::get('/admin/productReg',[PagesController::class, 'productReg']);

Route::get('/admin/viewPO',[PagesController::class, 'viewPOadmin']);

//routes as user

Route::get('/user/addPO',[PagesController::class, 'addPOuser']);

Route::get('/user/viewPO',[PagesController::class, 'viewPOuser']);


Route::post('/admin/zoneReg',[DataController::class, 'storeZone']);
Route::post('/admin/regionReg',[DataController::class, 'storeRegion']);
Route::post('/admin/territoryReg',[DataController::class, 'storeTerritories']);
Route::post('/admin/userReg',[UserDataController::class, 'storeUsers']);