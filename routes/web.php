<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AuthManageController;
use App\Http\Controllers\MapTqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileUpdateController;

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
    return view('auth.register');
});

Route::get('/message', function () {
    return view('client-site.message');
});


Auth::routes();

Route::group(['middleware'=>['auth']],function (){
    Route::get('/home',[AuthManageController::class,'index'])->name('home');

    Route::group(['middleware'=>['role:admin'],'prefix'=>'admin/'],function (){
        Route::get('/',[AdminHomeController::class,'index']);
    });
    Route::group(['middleware'=>['role:user'],'prefix'=>'user/'],function (){
        Route::get('/',function (){
            return redirect()->route('user-home');
        });
        Route::get('/home', [HomeController::class, 'index'])->name('user-home');
        Route::post('/profile_update', [ProfileUpdateController::class, 'ProfileUpdate'])->name('ProfileUpdate');
        Route::get('/group-members',[HomeController::class,'show'])->name('group-members');
        Route::get('/view-progress/{ID}',[MapTqController::class,'result'])->name('view.progress');

        Route::post('registering',[MapTqController::class,'index'])->name('registering');
    });

});

