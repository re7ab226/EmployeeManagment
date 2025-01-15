<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cityController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\stateController;
use App\Http\Controllers\countryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\departmentController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
            Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
                Route::get('/',[AdminController::class,'index'])->name('index');
                Route::Resource('/users', userController::class);
                Route::Resource('/employees', employeeController::class);
                Route::Resource('/state', stateController::class);
                Route::Resource('/city', cityController::class);
                Route::Resource('/country', countryController::class);
                Route::Resource('/department', departmentController::class);

            });
    require __DIR__.'/auth.php';
    
    
    
});