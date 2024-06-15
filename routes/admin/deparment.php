<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Department\DepartmentController;


    Route::prefix('phong-ban')->middleware('checkrole:12')->name('phong-ban.')->group(function(){
            Route::get('/',[DepartmentController::class,'list'])->name('danh-sach');
            Route::get('/them',[DepartmentController::class,'add'])->name('them');
            Route::post('/them',[DepartmentController::class,'post'])->name('them');
            Route::get('/chinh-sua/{id}',[DepartmentController::class,'edit'])->name('chinh-sua');
            #POST - Chỉnh sửa
            Route::post('/chinh-sua/{id}',[DepartmentController::class,'post_edit'])->name('chinh-sua');
            Route::get('/xoa/{id}',[DepartmentController::class,'delete_item'])->name('xoa');
    });
