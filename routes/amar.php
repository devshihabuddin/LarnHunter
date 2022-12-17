<?php

use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudensController;
use App\Http\Controllers\ProfileController;
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
*/

Route::get('/', function () {
   // dd(app());
    return view('welcome');
});

Route::get('/amar', function () {
    return view('amar');
});



//__classes routes__//

Route::get('class/index', [ClassController::class, 'index'])->name('class.index');
Route::get('class/create', [ClassController::class, 'create'])->name('class.create');
Route::post('class/store', [ClassController::class, 'store'])->name('class.store');
Route::get('class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
Route::put('class/update/{id}', [ClassController::class, 'update'])->name('class.update');
Route::any('class/destroy/{id}', [ClassController::class, 'destroy'])->name('class.destroy');

//__Students Resource route Controller__//
Route::resource('students', StudensController::class);






























Route::get('/country', function(){
    return view('country');
})->middleware('country');

Route::get('/facade-test', function () {
    Hunter::test();
   // Hunter::testone();
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
