<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\Project\ProjectController;
use App\Http\Controllers\Home\Project\TaskController;

Route::prefix('du-an')->name('du-an.')->group(function (){
    Route::get('',[ProjectController::class,'list'])->name('danh-sach');
    Route::post('/them/{project_url}',[ProjectController::class,'add_task'])->name('them-task');
    Route::post('/them-thanh-vien/{project_url}',[ProjectController::class,'add_member'])->name('them-thanh-vien');
    Route::get('/xoa-thanh-vien/{project_url}/{id}',[ProjectController::class,'delete_user'])->name('xoa-thanh-vien');
    Route::get('/xoa-task/{project_url}/{id}',[ProjectController::class,'delete_task'])->name('xoa-task');
    Route::post('/chinh-sua/{project_id}/{id}',[ProjectController::class,'edit_task'])->name('chinh-sua-task');
    Route::get('/{project_url}/{user_name?}',[ProjectController::class,'detail'])->name('chi-tiet');
});
Route::prefix('task')->name('task.')->group(function () {
        Route::get('/{id}',[TaskController::class,'task_detail'])->name('chi-tiet');
        Route::post('them-binh-luan/{id}',[TaskController::class,'add_comment'])->name('them-binh-luan');
        Route::post('them-thanh-vien/{id}',[TaskController::class,'assign_member'])->name('them-thanh-vien');
        Route::post('chuyen-trang-thai/{id}',[TaskController::class,'change_status'])->name('chuyen-trang-thai');
        Route::get('xoa-thanh-vien/{id}/{user_id}',[TaskController::class,'delete_member'])->name('xoa-thanh-vien');
});
Route::get('chat-room',[\App\Http\Controllers\RedisController::class,'list'])->middleware('loginrequired')->name('chat-room');
Route::post('post-chat',[\App\Http\Controllers\RedisController::class,'post_message'])->name('post-chat');
