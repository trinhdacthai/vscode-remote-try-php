<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Salary\SalaryController;

Route::prefix('luong-nhan-vien')->middleware('checkrole:24')->name('luong-nhan-vien.')->group(function () {
    Route::get('/',[SalaryController::class,'list'])->name('danh-sach');
    Route::post('/cap-nhat-luong/{id}',[SalaryController::class,'post_change_salary'])->name('cap-nhat-luong');
    Route::post('/tao-phieu-luong/{id}',[SalaryController::class,'post_add_salary'])->name('tao-phieu-luong');
});
Route::prefix('lich-su-luong')->middleware('checkrole:26')->name('lich-su-luong.')->group(function () {
    Route::get('/',[SalaryController::class,'history'])->name('danh-sach');
    Route::get('/pdf/{id}',[SalaryController::class,'testpdf'])->name('pdf');

});
