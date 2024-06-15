<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Statistical\StatisticalController;
require 'admin/auth.php';
Route::prefix('quan-tri')->middleware(['loginrequired'])->name('quan-tri.')->group(function (){
    // các module thuộc quản trị sẽ tạo file trong thư mục admin và required tại đây
    Route::prefix('thong-ke-du-lieu')->name('thong-ke-du-lieu.')->group(function () {
       Route::get('',[StatisticalController::class,'index'])->name('danh-sach')->middleware('checkrole:1');
    });
        require 'admin/staff.php';
        require 'admin/deparment.php';
        require 'admin/systemconfig.php';
        require 'admin/Designation.php';
        require 'admin/project.php';
        require 'admin/category.php';
        require 'admin/customer.php';
        require 'admin/role.php';
        require 'admin/device.php';
        require 'admin/salary.php';
        require 'admin/invoice.php';
});
