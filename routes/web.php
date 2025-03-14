<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// テスト用
Route::get('/test', [TestController::class, 'test'])
->name('test');

// Post

// 記事一覧用ルーティング
Route::get('post', [PostController::class, 'index']);

// 新規投稿用ルーティング
Route::get('post/create', [PostController::class, 'create']);

// 投稿データ保存用
Route::post('post', [PostController::class, 'store'])
->name('post.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
