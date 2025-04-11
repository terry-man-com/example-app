<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// キーワード検索用 (アレンジ用)
Route::get('/post/search', [PostController::class, 'search'])
    ->name('post.search');

// マイページ表示用
Route::get('/post/mypage', [PostController::class, 'mypage'])
    ->name('post.mypage');

// マイページの編集・削除
Route::get('/post/mypage/show/{post}', [PostController::class, 'mypageShow'])
    ->name('post.mypage.show');

Route::resource('post', PostController::class);


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// 新規登録時、メール認証を追加
Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
