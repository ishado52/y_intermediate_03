<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// 表示
Route::get('/', [TodoController::class, 'index'])->name('index');
// 投稿
Route::post('/posts', [TodoController::class, 'store'])->name('posts.store');
// 削除
Route::delete('/posts/{id}', [TodoController::class, 'destroy'])->name('posts.destroy');
// Todo編集ページ
Route::get('/posts/{id}', [TodoController::class, 'edit'])->name('posts.edit');
// 更新
Route::put('/posts/{id}',[TodoController::class,'update'])->name('posts.update');