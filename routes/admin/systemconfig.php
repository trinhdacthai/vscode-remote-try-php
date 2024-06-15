<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\System\SystemConfigController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///


Route::prefix('cau-hinh-he-thong')->name('cauhinh.')->middleware('checkrole:2')->group(function (){
    Route::get('',[SystemConfigController::class,'view'])->name('hien-thi');
    Route::post('',[SystemConfigController::class,'post_view'])->name('gui-hien-thi');
});
