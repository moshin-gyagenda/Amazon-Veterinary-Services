<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DiagonosisController;
use App\Http\Controllers\DrugprescriptionController;
use App\Http\Controllers\VeterinaryshopController;
/*Veterinaryshop
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(UserController::class)->group(function() {
    Route::get('', 'index')->name('login');
    Route::post('user-login', 'login')->name('user-login');
    Route::get('logout', 'logout')->name('logout');
    Route::get('register-user', 'register')->name('register-user');
    Route::post('registration', 'userRegister')->name('registration');
    
});

//customer routes
Route::group(['middleware' =>['auth:sanctum']], function() {
    //Dashboard routes
    Route::controller(DashboardController::class)->group(function() {
        Route::get('dashboard', 'index')->name('dashboard');
        
    });

    //Aminal Registration routes
    Route::controller(AnimalController::class)->group(function () {
        Route::get('register-animal', 'index')->name('register-animal');
        Route::post('animal/store', 'store')->name('animal.store');
        Route::get('animals', 'create')->name('animals');
        Route::put('animals/{id}', 'update')->name('animals.update');
        // Route::delete('animals/{id}', 'destroy')->name('animals.destroy');
    });
    

    //Aminal Vaccination routes
    Route::controller(VaccinationController::class)->group(function() {
        Route::get('view-animal', 'index')->name('view-animal');
        
    });

    //Medicine routes
    Route::controller(MedicineController::class)->group(function() {
        Route::get('medicine', 'index')->name('medicine');
        Route::post('add-medicine', 'store')->name('add-medicine');
        Route::get('view-medicine', 'create')->name('view-medicine');
        Route::get('inventory', 'inventory')->name('inventory');
    });

    //Appointment routes
    Route::controller(AppointmentController::class)->group(function() {
        Route::get('appointment', 'index')->name('appointment');
        Route::post('create-appointment', 'store')->name('create-appointment');
        Route::get('view-appointments', 'create')->name('view-appointments');
        Route::post('/update-appointment-status',  'updateStatus')->name('update.appointment.status');
    });

    // Diagonosis routes
    Route::controller(DiagonosisController::class)->group(function() {
        Route::get('diagonosis', 'index')->name('diagonosis');
        Route::post('create-diagonosis', 'store')->name('create-diagonosis');
        Route::get('search', 'search')->name('search');
        Route::get('diagnosis-results', 'create')->name('diagnosis-results');
    });
    
    // DrugprescriptionController routes
    Route::controller(DrugprescriptionController::class)->group(function() {
        Route::get('drug-prescription', 'index')->name('drug-prescription');
        Route::get('/get-medicine-price', 'getMedicinePrice')->name('get-medicine-price');
        Route::post('/submit-prescription', 'store')->name('submit-prescription');
        Route::get('/prescription-summary', 'create')->name('prescription-summary');
        Route::get('/get-prescriptions',  'getPrescriptions')->name('get-prescriptions');

     });

     //Veterinaryshop routes
    Route::controller(VeterinaryshopController::class)->group(function() {
        Route::get('veterinary', 'index')->name('veterinary');
        Route::get('/get-medicine-price', 'getMedicinePrice')->name('get-medicine-price');
        Route::post('/prescription',  'store')->name('prescription');
        Route::get('billing-payment', 'create')->name('billing-payment');
        Route::get('/payment/{billingId}', 'show')->name('payment');

    });

    Route::controller(UserController::class)->group(function() {
        Route::get('user-register', 'create')->name('user-register');
        Route::post('register', 'store')->name('register');
        Route::get('users', 'show')->name('users');
    });
});
