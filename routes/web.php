<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RecordKeepingController;
use App\Http\Controllers\BillingProcessController;
use Illuminate\Support\Facades\Route;

// Authentication routes (for registration and login)
Route::middleware('guest')->group(function () {
    // Show the registration form
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');

    // Handle registration (POST request)
    Route::post('register', [AuthController::class, 'register']);

    // Show the login form
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

    // Handle login POST request
    Route::post('login', [AuthController::class, 'loginPost']);
});

// Home route (public route for visitors)
Route::get('/', function () {
    return view('welcome'); // Show the welcome view for visitors
})->name('home');

// Home route (only for authenticated users)
Route::middleware('auth')->group(function () {
    // Show the home view if the user is logged in
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Main route (after user logs in)
    Route::get('/main', function () {
        return view('main', [
            'title' => 'JAXBAN Auto Care Services',
            'services' => [
                'appointment_scheduling',
                'billing_process',
                'inventory_management', // No role check here anymore
                'record_keeping', // No role check here anymore
            ]
        ]);
    })->name('main');

    // Logout route
    Route::post('logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');

    // Appointment Scheduling route (always available)
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');

    // Billing Process route (always available)
    Route::get('/billing-process', [BillingProcessController::class, 'index'])->name('billing-process');

    // Inventory Management route (always accessible by all authenticated users)
    Route::prefix('inventory')->name('inventory.')->group(function() {
        // Inventory index
        Route::get('/', [InventoryController::class, 'index'])->name('index'); // List all inventories
        // Create inventory
        Route::get('/create', [InventoryController::class, 'create'])->name('create'); // Show create form
        Route::post('/', [InventoryController::class, 'store'])->name('store'); // Store new inventory item
        // Edit inventory
        Route::get('/{id}/edit', [InventoryController::class, 'edit'])->name('edit'); // Show edit form for specific item
        Route::put('/{id}', [InventoryController::class, 'update'])->name('update'); // Update inventory item
        // Delete inventory
        Route::delete('/{id}', [InventoryController::class, 'destroy'])->name('destroy'); // Delete inventory item
    });

    // Record Keeping route (always accessible by all authenticated users)
    Route::get('/record-keeping', [RecordKeepingController::class, 'index'])->name('record-keeping');
});
