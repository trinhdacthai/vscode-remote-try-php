

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Designation\DesignationController;

Route::prefix('vai-tro')->middleware('checkrole:13')->name('vai-tro.')->group(function(){
    Route::get('/',[DesignationController::class,'list'])->name('danh-sach');
    Route::get('/them',[DesignationController::class,'add'])->name('them');
    Route::post('/them',[DesignationController::class,'post'])->name('them');
    Route::get('/chinh-sua/{id}',[DesignationController::class,'edit'])->name('chinh-sua');
    #POST - Chỉnh sửa
    Route::post('/chinh-sua/{id}',[DesignationController::class,'post_edit'])->name('chinh-sua');
    Route::get('/xoa/{id}',[DesignationController::class,'delete'])->name('xoa');

});
