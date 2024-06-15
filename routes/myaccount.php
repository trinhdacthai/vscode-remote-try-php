<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyAccountController;
# các view mẫu - KHÔNG CHỈNH SỬA TRONG NÀY
Route::prefix('tai-khoan')->name('tai-khoan.')->group(function (){
   Route::get('/',[MyAccountController::class,'my_info'])->name('thong-tin');
   Route::post('/cap-nhat',[MyAccountController::class,'post_edit'])->name('cap-nhat');
   Route::post('/them-kinh-nghiem',[MyAccountController::class,'post_add_experience'])->name('them-kinh-nghiem');
   Route::post('/them-hoc-van',[MyAccountController::class,'post_add_education'])->name('them-hoc-van');
   Route::post('/cap-nhat-kinh-nghiem/{id}',[MyAccountController::class,'post_update_experience'])->name('cap-nhat-kinh-nghiem');
   Route::post('/cap-nhat-hoc-van/{id}',[MyAccountController::class,'post_update_education'])->name('cap-nhat-hoc-van');
   Route::get('/xoa-kinh-nghiem/{id}',[MyAccountController::class,'delete_experience'])->name('xoa-kinh-nghiem');
   Route::get('/xoa-hoc-van/{id}',[MyAccountController::class,'delete_education'])->name('xoa-hoc-van');
   Route::get('/hoc-van',[MyAccountController::class,'edit_education'])->name('hoc-van');
   Route::post('/doi-mat-khau',[MyAccountController::class,'update_password'])->name('doi-mat-khau');
});

