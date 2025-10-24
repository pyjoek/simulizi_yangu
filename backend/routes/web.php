<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
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

Route::get('/', [StoryController::class, 'welcome']);
Route::get('/story', [StoryController::class, 'index'])->name('stories.index');
Route::get('/story/{id}', [StoryController::class, 'show'])->name('stories.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [StoryController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/show', function () {
        return view('profile.show');
    });
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/newStory', [StoryController::class, 'uploadImage'])->name('stories.store');
    Route::get('/addStory', function () {
        return view('stories.index');
    });
});



require __DIR__.'/auth.php';
