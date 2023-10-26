<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

// Rute untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Rute dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard', [ItemController::class, 'dashboard'])->name('dashboard');

    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');

});



// Arahkan rute utama ke rute login
Route::get('/', function () {
    return redirect()->route('login');
});
