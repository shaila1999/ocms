<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrphanController;
use App\Http\Controllers\MemberController;
use App\Http\controllers\StaffController;
use App\Http\controllers\ParentController;
use App\Http\controllers\UserController;
use App\Http\Controllers\WebHomeController;

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
   



//Route for website
Route::get('/',[WebHomeController::class,'webHome'])->name('home');
Route::post('/register',[WebHomeController::class, 'registration'])->name('registration');
Route::post('/login',[WebHomeController::class,'login'])->name('login');

 





//for admin panel 
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/do-login',[UserController::class,'doLogin'])->name('do.login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
  


  
Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
 
   Route::get('/',[HomeController::class,'Dashboard'])->name('dashboard');
   Route::get('/admin',[AdminController::class,'panel'])->name('admin');
   Route::get('/orphans',[OrphanController::class,'center'])->name('orphans');
   Route::get('/orphan/create',[OrphanController::class,'createForm'])->name('orphan.create');

   Route::get('/members',[MemberController::class,'list'])->name('members');
   Route::get('/member/create',[MemberController::class,'createForm'])->name('member.create');
   Route::post('/member/access',[MemberController::class,'access'])->name('member.access');
  
   Route::get('/staffs',[StaffController::class,'stafflist'])->name('staff.list');
   Route::get('/staff/create',[StaffController::class,'createlist'])->name('staff.create');
   Route::post('/staff/care',[StaffController::class,'care'])->name('staff.care');
  
   Route::get('/parents',[ParentController::class,'method'])->name('parents');
   Route::get('/parent/create',[ParentController::class,'name'])->name('parent.create');
   Route::post('/parent/class',[ParentController::class,'class'])->name('parent.class');

   Route::get('/staff/delete/{staff_id}',[StaffController::class,'deleteStaff'])->name('admin.staff.delete');
   Route::get('/staff/view/{staff_id}',[StaffController::class,'viewStaff'])->name('admin.staff.view');
 
   Route::get('/staff/edit/{staff_id}',[StaffController::class,'edit'])->name('staff.edit');
   Route::put('/staff/update/{staff_id}',[StaffController::class,'update'])->name('staff.update');
 

}); 
  
  
