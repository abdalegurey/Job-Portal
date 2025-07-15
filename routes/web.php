<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\employee;
use App\Http\Controllers\employees;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchManagerController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// })->name('home');


Route::get('/', [JobController::class, 'indexJob'])->name('home');
Route::get('/About', function () {
    return view('About');
})->name('About');

Route::get('/Contact', function () {
    return view('Contact');
})->name('Contact');


Route::middleware(['auth','IsAdmin'])->group(function () {
//     Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware([ 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix("admin")->name("admin")->group( function(){
         Route::resource('jobs', JobController::class);
    Route::get('jobs/{job}/applicants', [JobController::class, 'showApplicants'])->name('jobs.applicants');
    Route::get('applicants', [ApplicantController::class, 'index'])->name('admin.applicants.index');

     

       

 


  Route::resource('users',userController::class);
  


});

});


 



Route::get('/apply/{job}', [ApplicantController::class, 'showForm'])->name('apply.form');
Route::post('/apply/{job}', [ApplicantController::class, 'submitForm'])->name('apply.submit');

require __DIR__.'/auth.php';
