<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Customer\CustomerController;


Route::prefix('khach-hang')->middleware('checkrole:15')->name('khach-hang.')->group(function(){
    Route::get('/',[CustomerController::class,'all'])->name('danh-sach');
    Route::get('/them',[CustomerController::class,'get_add'])->name('them');
    Route::post('/them',[CustomerController::class,'post_add'])->name('them');
    Route::get('/chinh-sua/{id}',[CustomerController::class,'get_edit'])->name('chinh-sua');
    Route::post('/chinh-sua/{id}',[CustomerController::class,'post_edit'])->name('chinh-sua');
    Route::get('xoa/{id}',[CustomerController::class,'delete_item'])->name('xoa');
});
