<?php

namespace App\Http\Middleware\Admin;

use App\Models\User;
use App\Models\Page;
use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$page)
    {
//        dd($page);

        //kiem tra admin?
        if(Auth::guard('admin')->user()->user_type==1){
            return $next($request);
        }
        //kiem tra quyen user==null
        elseif(Auth::guard('admin')->user()->role_id == null){
            Toastr::warning('Không đủ quyền');
            return redirect()->route('du-an.danh-sach');

        }
        //khac null thi  lay ra array quyen, check  id page co nam trong quyen?
        else{
            $admin = User::find(Auth::guard('admin')->id());
            //check
            if(in_array($page,unserialize($admin->role->role_permission)??[])){
                return $next($request);
            }
            if(unserialize($admin->role->role_permission)[0]){
                $ida = Page::find(unserialize($admin->role->role_permission)[0]);
                Toastr::warning('Không đủ quyền');
                return redirect($ida->page_url);
            }
            Toastr::warning('Không đủ quyền');
            return redirect()->route('du-an.danh-sach');

        }

    }
}
