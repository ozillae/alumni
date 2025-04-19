<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
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

Route::get('/', function () {
    return view('main');
})->name('main');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/member', [GuestController::class, 'member'])->name('members');
Route::get('/member-detail/{code}', [GuestController::class, 'memberDetail'])->name('member-detail');
Route::get('/photos', [GuestController::class, 'photos'])->name('photos');
Route::get('/photo-detail/{code}', [GuestController::class, 'photoDetail'])->name('photo-detail');
Route::get('/videos', [GuestController::class, 'videos'])->name('videos');
Route::get('/video-detail/{code}', [GuestController::class, 'videoDetail'])->name('video-detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->middleware(['auth', 'verified', 'useradmin'])->group(function () {
        Route::resources([
            'divisions' => DivisionController::class,
            'photos' => PhotoController::class,
            'videos' => VideoController::class,
        ]);


    });

    Route::prefix('member')->middleware(['auth', 'verified', 'usermember'])->group(function () {
        Route::resources([
            'member' => MemberController::class,
        ]);


    });
});

require __DIR__.'/auth.php';
