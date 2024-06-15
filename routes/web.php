<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParamController;
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

//Route::get('/thong', function () {
//    return view('Admin.Statistical.Index');
//})->middleware('loginrequired');
    Route::get('/',function () {
       if (\Illuminate\Support\Facades\Auth::guard('admin')->check()) {
           return redirect()->route('du-an.danh-sach');
       }
        return redirect()->route('dang-nhap');
    });
    require 'admin.php';
    require 'myaccount.php';
    require 'home.php';
    # các view mẫu
    Route::prefix('view')->name('view.')->group(function (){
        #route view/user
        Route::get('user',function (){
           return view('Admin.Example.user');
        });
                 #route view/activities
                Route::get('activities',function (){
                   return view('Admin.Example.activities');
                });
                #route view/attendance
                Route::get('attendance',function (){
                   return view('Admin.Example.attendance');
                });
                 #route view/changepass
                    Route::get('changepass',function (){
                       return view('Admin.Example.change-password');
                    });

                    #route view/employee
                    Route::get('employee',function (){
                       return view('Admin.Example.employee');
                    });
                    #route view/404
                    Route::get('404',function (){
                       return view('Admin.Example.error-404');
                    });
                    #route view/lead
                    Route::get('lead',function (){
                        return view('Admin.Example.lead');
                    });
                    #route view/leaves
                    Route::get('leaves',function (){
                        return view('Admin.Example.leaves');
                    });
                    #route view/profile
                    Route::get('profile',function (){
                        return view('Admin.Example.profile');
                    });
                    #route view/project
                    Route::get('project',function (){
                        return view('Admin.Example.project');
                    });
                    #route view/role
                    Route::get('role',function (){
                        return view('Admin.Example.role-permission');
                    });
                    #route view/setting
                    Route::get('setting',function (){
                        return view('Admin.Example.setting');
                    });
                    #route view/task
                    Route::get('task',function (){
                        return view('Admin.Example.task');
                    });
                    #route view/component
                    Route::get('component',function (){
                        return view('Admin.Example.component');
                    });

    });

    Route::prefix('param')->name('param.')->group(function (){
        Route::get('designation/{id}',[ParamController::class,'get_designation'])->name('designation');
    });
