<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

Route::get('/', [TodoListController::class, 'index']);
Route::post('/saveItem', [TodoListController::class, 'saveItem'])->name('saveItem');
Route::post('/markComplete/{id}', [TodoListController::class, 'markComplete'])->name('markComplete');
Route::post('/markUncompleted/{id}', [TodoListController::class, 'markUncompleted'])->name('markUncompleted');
