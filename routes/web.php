<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstructorController;
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
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

Route::middleware(['auth','roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth','roles:instructor'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'instructorDashboard'])->name('instructor.dashboard');
});


// User Routes
Route::middleware(['auth','roles:user'])->group(function () {
    Route::get('/feeds', [UserController::class, 'UserDashboard'])->name('user.feeds'); 
    Route::get('/logout', [UserController::class, 'userDestroy'])->name('user.logout');

    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/setting', [UserController::class, 'userProfileEdit'])->name('user.profile.edit');

    Route::post('/profile/photo', [UserController::class, 'updatePhoto'])->name('user.profile.photo');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
    
    Route::post('/profile/store', [UserController::class, 'userProfileStore'])->name('user.profile.store');
    Route::post('/update/password', [UserController::class, 'userUpdatePassword'])->name('user.update.password');
    
    // Add a route for showing the users and follow/unfollow buttons
    // Route::get('/friends', [UserController::class, 'index'])->name('user.friends.index');
    
    
    // Friends Route 
    Route::prefix('friends')->controller(FriendsController::class)->group(function () {
        Route::get('/friends-list', 'showAllFriends')->name('friends.list');
    });

    Route::prefix('follows')->middleware('auth')->group(function () {
        Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
        Route::delete('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
    });

    // Route::prefix('posts')->controller(PostController::class)->group(function () {
    //     Route::post('/store-post', 'storePost')->name('posts.store');
    // });

    // Route::prefix('posts')->group(function () {
    //     Route::controller(PostController::class)->group(function () {
    //         Route::get('/store-post', 'storePost')->name('posts.store');
    //     });
    // });

    Route::prefix('posts')->controller(PostController::class)->group(function () {
        // Route::get('/friends-list', 'showAllFriends')->name('friends.list');
        Route::get('/store-post', 'storePost')->name('posts.store');

        Route::post('post/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::post('comments/{comment}/replies', [ReplyController::class, 'store'])->name('replies.store');
    });

   





   
});

