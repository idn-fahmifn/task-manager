<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


// Route Admin
Route::prefix('administrator')->middleware(['auth', 'verified','admin'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
});

// Route Team

Route::prefix('team')->middleware(['auth', 'verified', 'team'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'team'])->name('dashboard.team');
});

// // Route User
Route::prefix('user')->middleware(['auth', 'verified', 'user'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'user'])->name('dashboard.user');
    
    // submit Proeject
    Route::post('submit-project', [ProjectController::class, 'submitProject'])->name('project.store');
    Route::get('detail/{slug}', [ProjectController::class, 'show'])->name('user.detail-project');


});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
