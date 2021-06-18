<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminCountingController;
use App\Http\Controllers\admin\AdminMessageController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\AdminVaccineController;
use App\Http\Controllers\Testcontroler;
use App\Models\Governorate;
use App\Models\Vaccine;
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
});











Route::get('/', function () {
    $governorates = Governorate::all();
    $injury = 0;
    $recovery = 0;
    $deaths = 0;
    foreach ($governorates as $governorate) {
        $injury += $governorate->injury;
        $recovery += $governorate->recovery;
        $deaths += $governorate->deaths;
    }
    // dd($injury);
    return view('index', [
        'injury' => $injury,
        'recovery' => $recovery,
        'deaths' => $deaths,
        'governorates' => $governorates,
    ]);
})->name('home');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/vaccine', function () {
    return view('vaccine',[
        'vaccines' => Vaccine::all(),
    ]);
})->name('vaccine');


Route::post('/message', [AdminMessageController::class, 'store'])->name('message.store');


Route::resource('/test', Testcontroler::class);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
