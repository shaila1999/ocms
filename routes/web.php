<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrphanController;
use App\Http\Controllers\MemberController;
use App\Http\controllers\StaffController;
use App\Http\controllers\ParentController;
use App\Http\Controllers\DonorController;
use App\Http\controllers\UserController;
use App\Http\Controllers\WebHomeController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\DonationController;


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
Route::post('/user/login',[WebHomeController::class,'login'])->name('user.login');


Route::get('/frontend/orphan',[WebHomeController::class,'orphanlist'])->name('orphan.list');
Route::get('/frontend/view',[WebHomeController::class,'vieworphan'])->name('view.orphan');
Route::get('/frontend/orphan/view/{view_id}',[WebHomeController::class,'orphanview'])->name('frontend.orphan.view');

Route::get('/frontend/parent',[WebHomeController::class,'parentform'])->name('parent.form');
Route::post('/frontend/parent/list',[WebHomeController::class,'parentlist'])->name('parent.list');

Route::get('/donor/create',[DonorController::class,'donorcreate'])->name('donor.create');
Route::post('/donor/info',[DonorController::class,'info'])->name('donor.info');




Route::group(['middleware'=>'auth'],function(){

   Route::get('/frontend/adopt/now/{orphan_id}',[WebHomeController::class,'adoptnow'])->name('adopt.now');
   Route::post('/frontend/adopt/orphan/{orphan_id}',[WebHomeController::class,'adoptorphan'])->name('adopt.orphan');

   
   
   Route::get('/user/logout', [WebHomeController::class, 'logout'])->name('user.logout');
   Route::get('/profile',[WebHomeController::class,'profile'])->name('user.profile');
   Route::put('/profile/update',[WebHomeController::class,'updateProfile'])->name('profile.update');

});


//for admin Login 
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/do-login',[UserController::class,'doLogin'])->name('do.login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
 
  
Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
   Route::group(['middleware'=>'admin'],function(){
   
   
      Route::get('/',[HomeController::class,'Dashboard'])->name('dashboard');
      Route::get('/user/list',[UserController::class,'userlist'])->name('user.list');
      Route::get('/user/active/{user_id}',[UserController::class,'active'])->name('user.active');
      Route::get('/user/reject/{user_id}',[UserController::class,'reject'])->name('user.reject');
   

      Route::get('/admin',[AdminController::class,'panel'])->name('admin');

      Route::get('/orphans',[OrphanController::class,'center'])->name('orphans');
      Route::get('/orphan/create',[OrphanController::class,'createForm'])->name('orphan.create');
      Route::post('/orphan/info',[OrphanController::class,'info'])->name('orphan.info');


      Route::get('/orphan/delete/{orphan_id}',[OrphanController::class,'deleteOrphan'])->name('admin.orphan.delete');
      Route::get('/orphan/view/{orphan_id}',[OrphanController::class,'viewOrphan'])->name('admin.orphan.view');
      Route::get('/orphan/edit/{orphan_id}',[OrphanController::class,'edit'])->name('orphan.edit');
      Route::put('/orphan/update/{orphan_id}',[OrphanController::class,'update'])->name('orphan.update');
   
 
   
      Route::get('/members',[MemberController::class,'list'])->name('members');
      Route::get('/member/create',[MemberController::class,'createForm'])->name('member.create');
      Route::post('/member/access',[MemberController::class,'access'])->name('member.access');

      Route::get('/member/delete/{member_id}',[MemberController::class,'deleteMember'])->name('admin.member.delete');
      Route::get('/member/view/{member_id}',[MemberController::class,'viewMember'])->name('admin.member.view');
      Route::get('/member/edit/{member_id}',[MemberController::class,'editMember'])->name('member.edit');
      Route::put('/member/update/{member_id}',[MemberController::class,'update'])->name('member.update');




      Route::get('/staffs',[StaffController::class,'stafflist'])->name('staff.list');
      Route::get('/staff/create',[StaffController::class,'createlist'])->name('staff.create');
      Route::post('/staff/care',[StaffController::class,'care'])->name('staff.care');

      Route::get('/staff/delete/{staff_id}',[StaffController::class,'deleteStaff'])->name('admin.staff.delete');
      Route::get('/staff/view/{staff_id}',[StaffController::class,'viewStaff'])->name('admin.staff.view');
      Route::get('/staff/edit/{staff_id}',[StaffController::class,'edit'])->name('staff.edit');
      Route::put('/staff/update/{staff_id}',[StaffController::class,'update'])->name('staff.update');
   



      Route::get('/parents',[ParentController::class,'method'])->name('parents');
      Route::get('/parent/create',[ParentController::class,'name'])->name('parent.create');
      Route::post('/parent/class',[ParentController::class,'class'])->name('parent.class');

      Route::get('/parent/delete/{parent_id}',[ParentController::class,'deleteParent'])->name('admin.parent.delete');
      Route::get('/parent/view/{parent_id}',[ParentController::class,'viewParent'])->name('admin.parent.view');
      Route::get('/parent/edit/{parent_id}',[ParentController::class,'edit'])->name('parent.edit');
      Route::put('/parent/update/{parent_id}',[ParentController::class,'update'])->name('parent.update');


      Route::get('/adoptions',[AdoptionController::class,'adopt'])->name('adoptions');
      Route::get('/adoption/list',[AdoptionController::class,'adoptlist'])->name('adopt.list');
      Route::post('/adoption/form',[AdoptionController::class,'adoptform'])->name('adopt.form');
      
      
      Route::get('/donations',[DonationController::class,'donate'])->name('donations');
      Route::get('/donation/form',[DonationController::class,'donationform'])->name('donation.form');
      Route::post('/donation/donate',[DonationController::class,'donationdonate'])->name('donation.donate');

      Route::get('/donation/confirmation',[DonationController::class,'confirmation'])->name('donation.confirmation');
      Route::post('/donation/payment',[DonationController::class,'paymentconfirmation'])->name('donation.payment');



      Route::get('/donors',[DonorController::class,'information'])->name('donors');
      
      
   

   }); 
});
  
  
