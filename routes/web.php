<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MemberPortoController;
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

Route::get('/ceremony', [GuestController::class, 'ceremony'])->name('ceremony');
Route::get('/ceremony-detail/{id}', [GuestController::class, 'ceremonyDetail'])->name('ceremony-detail');
Route::get('/member', [GuestController::class, 'member'])->name('members');
Route::get('/member-detail/{code}', [GuestController::class, 'memberDetail'])->name('member-detail');
Route::get('/photos', [GuestController::class, 'photos'])->name('photos');
Route::get('/photo-detail/{code}', [GuestController::class, 'photoDetail'])->name('photo-detail');
Route::get('/videos', [GuestController::class, 'videos'])->name('videos');
Route::get('/video-detail/{code}', [GuestController::class, 'videoDetail'])->name('video-detail');

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->user_type === 'A') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->user_type === 'B') {
        return redirect()->route('admin2.dashboard');
    } elseif ($user->user_type === 'C') {
        return redirect()->route('member.dashboard');
    }
    abort(403, 'Unauthorized');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->middleware(['auth', 'verified', 'useradmin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::post('/members-approve', [MemberController::class, 'approve'])->name('members.approve');
        Route::post('/members-reject', [MemberController::class, 'reject'])->name('members.reject');

        Route::resources([
            'events' => EventController::class,
            'divisions' => DivisionController::class,
            'photos' => PhotoController::class,
            'videos' => VideoController::class,
            'members' => MemberController::class,
        ]);
    });

    Route::prefix('admin2')->middleware(['auth', 'verified', 'useradmin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin2.dashboard');
        })->name('admin2.dashboard');
        // Add additional routes for admin2 if needed
    });

    Route::prefix('member')->middleware(['auth', 'verified', 'usermember'])->group(function () {
        Route::get('/dashboard', function () {
            $user = auth()->user();
            if ($user->member === null) {
                return redirect()->route('member.first');
            }
            return view('member.dashboard', compact('user'));
        })->name('member.dashboard');

        Route::get('/first', [MembershipController::class, 'first'])->name('member.first');
        Route::post('/post-member', [MembershipController::class, 'saveMember'])->name('member.postmember');
        Route::get('/upload-photo', [MembershipController::class, 'formPhoto'])->name('member.uploadPhoto');
        Route::post('/post-upload-photo', [MembershipController::class, 'uploadPhoto'])->name('member.storePhoto');
        Route::get('/update-member', [MembershipController::class, 'formUpdateMember'])->name('member.update');
        Route::post('/pos-update-member', [MembershipController::class, 'UpdateMember'])->name('member.storeUpdate');

        Route::resources([
            'membership' => MembershipController::class,
            'portofolio' => MemberPortoController::class,
        ]);


    });
});

require __DIR__.'/auth.php';
