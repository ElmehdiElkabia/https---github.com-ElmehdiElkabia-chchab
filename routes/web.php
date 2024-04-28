<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\JaimeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SignalementController;

// Routes accessible without authentication
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

// Routes protected by authentication middleware
Route::middleware(['auth'])->group(function () {
    // Product Routes
    Route::get('/produits/top-liked', [ProduitController::class, 'topLiked']);
    Route::get('/produits/search', [ProduitController::class, 'search']); // Add this line for search
    Route::resource('/produits', ProduitController::class);

    // Company Routes
    Route::resource('/entreprises', EntrepriseController::class);
    Route::get('/entreprises/search', [EntrepriseController::class, 'search']);


    // Report Routes
    Route::resource('/signalements', SignalementController::class);

    // Like Routes
    Route::resource('/jaimes', JaimeController::class);
});
