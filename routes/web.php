<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrphanController;
use App\Http\Controllers\MemberController;

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

  Route::get('/',[HomeController::class,'Dashboard']);
  Route::get('/contact',[HomeController::class,'contact']);
  Route::get('/admin',[AdminController::class,'panel']);
  Route::get('/orphans',[OrphanController::class,'list']);
  Route::get('/members',[MemberController::class,'list']);
  
