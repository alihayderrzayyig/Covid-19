<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminCountingController;
use App\Http\Controllers\admin\AdminDoctorController;
use App\Http\Controllers\admin\AdminMessageController;
use App\Http\Controllers\admin\AdminProtectionController;
use App\Http\Controllers\admin\AdminSymptomController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\AdminVaccineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

counting

*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');


    Route::get('/message', [AdminMessageController::class, 'index'])->name('message.index');
    Route::put('/message/{message}', [AdminMessageController::class, 'show'])->name('message.show');
    Route::delete('/message/{message}', [AdminMessageController::class, 'destroy'])->name('message.destroy');

    Route::get('/counting', [AdminCountingController::class, 'index'])->name('counting.index');
    Route::get('/counting/{governorate}/edit', [AdminCountingController::class, 'edit'])->name('counting.edit');
    Route::put('/counting/{governorate}', [AdminCountingController::class, 'update'])->name('counting.update');

});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/users', AdminUserController::class);
    Route::resource('/vaccine', AdminVaccineController::class);
    Route::resource('/protection', AdminProtectionController::class);
    Route::resource('/symptom', AdminSymptomController::class);
    Route::resource('/doctor', AdminDoctorController ::class);
});



Route::group(['middleware' => ['auth']], function (){
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'profileUpdate'])->name('profile.update');
    Route::put('/password/update', [UserController::class, 'passwordUpdate'])->name('password.update2');
});





Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/vaccine', [HomeController::class, 'vaccine'])->name('vaccine');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/doctor', [HomeController::class, 'doctor'])->name('doctor');
Route::post('/message', [AdminMessageController::class, 'store'])->name('message.store');

// Route::resource('/test', Testcontroler::class);


require __DIR__ . '/auth.php';
