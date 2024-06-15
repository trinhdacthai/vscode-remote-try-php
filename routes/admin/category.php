<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Project\CategoryController;

// Route::prefix('nhom-du-an')->middleware('checkrole:29')->name('nhom-du-an.')->group(function(){
//      Route::get('/',[CategoryController::class,'index'])->name('danh-sach');
//      Route::get('/them',[CategoryController::class,'create'])->name('them');
//      Route::post('/them',[CategoryController::class,'post_create'])->name('them');
//      Route::get('/chinh-sua/{id}',[CategoryController::class,'edit'])->name('chinh-sua');
//      Route::post('/chinh-sua/{id}',[CategoryController::class,'post_edit'])->name('chinh-sua');
// });