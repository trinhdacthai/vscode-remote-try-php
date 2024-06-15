<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Project\ProjectController;
Route::prefix('du-an')->middleware('checkrole:14')->name('du-an.')->group(function (){
    # get - danh sách
    Route::get('',[ProjectController::class,'list'])->name('danh-sach');
    # get -thêm
    Route::get('them',[ProjectController::class,'create'])->name('them');
    Route::post('them',[ProjectController::class,'post_create'])->name('them');
    Route::get('chinh-sua/{id}',[ProjectController::class,'edit'])->name('sua');
    Route::post('chinh-sua/{id}',[ProjectController::class,'post_edit'])->name('sua');
    Route::get('xoa/{id}',[ProjectController::class,'delete'])->name('xoa');
});
