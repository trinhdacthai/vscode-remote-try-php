<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Device\DeviceController;

Route::prefix('thiet-bi')->middleware('checkrole:16')->name('thiet-bi.')->group(function(){
    Route::get('',[DeviceController::class,'list'])->name('danh-sach');
    Route::get('them-thiet-bi',[DeviceController::class,'add'])->name('them-thiet-bi');
    Route::get('chinh-sua/{id}',[DeviceController::class,'edit'])->name('chinh-sua');
    Route::post('chinh-sua/{id}',[DeviceController::class,'post_edit'])->name('chinh-sua');
    Route::post('them-thiet-bi',[DeviceController::class,'post_add'])->name('them-thiet-bi');
    Route::get('bao-hong/{id}',[DeviceController::class,'device_error'])->name('bao-hong');
    Route::get('khoi-phuc/{id}',[DeviceController::class,'device_nor'])->name('khoi-phuc');
    Route::post('cap-thiet-bi',[DeviceController::class,'admin_device'])->name('cap-thiet-bi');
    Route::get('thu-hoi/{id}',[DeviceController::class,'admin_device_remove'])->name('thu-hoi');
});
Route::prefix('lich-su-thiet-bi')->middleware('checkrole:17')->name('lich-su-thiet-bi.')->group(function() {
    Route::get('',[DeviceController::class,'history_device'])->name('danh-sach');

});
