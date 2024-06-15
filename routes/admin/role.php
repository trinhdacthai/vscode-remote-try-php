<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Role\RoleController;

Route::prefix('phan-quyen')->middleware('checkrole:18')->name('phan-quyen.')->group(function (){
    Route::get('',[RoleController::class,'list_role'])->name('danh-sach');
    Route::get('them-quyen',[RoleController::class,'get_add_role'])->name('them-quyen');
    Route::post('them-quyen',[RoleController::class,'post_add_role'])->name('them-quyen');
    Route::get('chinh-sua/{id}',[RoleController::class,'get_edit_role'])->name('chinh-sua');
    Route::post('chinh-sua/{id}',[RoleController::class,'post_edit_role'])->name('chinh-sua');
    Route::get('xoa/{id}',[RoleController::class,'delete_item'])->name('xoa');
    Route::get('phan-quyen-quan-tri',[RoleController::class,'admin_role'])->name('phan-quyen-quan-tri');

});
Route::prefix('danh-sach-phan-quyen')->middleware('checkrole:20')->name('phan-quyen-quan-tri.')->group(function () {
    Route::get('', [RoleController::class, 'admin_role'])->name('danh-sach');
    Route::post('/cap-nhat/{id}',[RoleController::class,'update_role'])->name('cap-nhat');

});
