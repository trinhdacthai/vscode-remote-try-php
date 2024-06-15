<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
    Route::get('dang-nhap',[AuthController::class,'get_login'])->middleware(['logincheck'])->name('dang-nhap');
    Route::post('dang-nhap',[AuthController::class,'post_login'])->middleware(['logincheck'])->name('dang-nhap');
    Route::get('dang-xuat',[AuthController::class,'logout'])->name('dang-xuat');
    Route::get('dang-ki',[AuthController::class,'get_register'])->name('dang-ki');
    Route::post('dang-ki',[AuthController::class,'post_register'])->name('dang-ki');



    