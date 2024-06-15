<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Staff\StaffController;
Route::prefix('quan-ly-nhan-vien')->middleware('checkrole:10')->name('quan-ly-nhan-vien.')->group(function (){
    # get - danh sách
    Route::get('/',[StaffController::class,'list_all'])->name('danh-sach');
    # get - thêm
    Route::get('/them',[StaffController::class,'create'])->name('them');
    Route::post('/them',[StaffController::class,'post_create'])->name('them');
    # get chỉnh sửa
    Route::get('/chinh-sua/{id}',[StaffController::class,'edit'])->name('chinh-sua');
   #POST - Chỉnh sửa
    Route::post('/chinh-sua/{id}',[StaffController::class,'post_edit'])->name('chinh-sua');

    # get - kích hoạt
    Route::get('/kich-hoat/{id}',[StaffController::class,'active'])->name('kich-hoat');
    # get -hủy kích hoạt
    Route::get('/huy-kich-hoat/{id}',[StaffController::class,'un_active'])->name('huy-kich-hoat');
     # get -Xóa tạm thời
     Route::get('/xoa/{id}',[StaffController::class,'delete'])->name('xoa');
});
Route::prefix('nhan-vien-da-xoa')->middleware('checkrole:21')->name('nhan-vien-da-xoa.')->group(function () {
    Route::get('',[StaffController::class,'list_trash'])->name('danh-sach');
    Route::get('/khoi-phuc/{id}',[StaffController::class,'refresh'])->name('khoi-phuc');

});
