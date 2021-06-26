<?php

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
    return view('welcome');
});

Route::middleware(['verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/** Artisan Commands */
Route::prefix('artisan')->group(function () {
    Route::get('/auth-resets', function() { Artisan::call('auth:clear-resets'); echo 'Flush expired password reset tokens'; });
    Route::get('/cache-clear', function() { Artisan::call('cache:clear'); echo 'Flush the application cache'; });
    Route::get('/cache-forget', function() { Artisan::call('cache:forget'); echo 'Remove an item from the cache'; });
    Route::get('/config-cache', function() { Artisan::call('config:cache'); echo 'Create a cache file for faster configuration loading'; });
    Route::get('/config-clear', function() { Artisan::call('config:clear'); echo 'Remove the configuration cache file'; });

    Route::get('/package-discover', function() { Artisan::call('package:discover'); echo 'Rebuild the cached package manifest'; });

    Route::get('/route-cache', function() { Artisan::call('route:cache'); echo 'Create a route cache file for faster route registration'; });
    Route::get('/route-clear', function() { Artisan::call('route:clear'); echo 'Remove the route cache file'; });
    Route::get('/route-list', function() { Artisan::call('route:list'); echo 'routes'; });

    Route::get('/symlink', function() { Artisan::call('storage:link'); echo 'Storage link created'; });
    Route::get('/view-cache', function() { Artisan::call('view:cache'); echo 'Compile all of the application\'s Blade templates'; });
    Route::get('/view-clear', function() { Artisan::call('view:clear'); echo 'Clear all compiled view files'; });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
