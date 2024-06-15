<?php

namespace App\Http\Controllers;

use App\Events\RedisEvent;
use App\Helper\DateHelper;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedisController extends Controller
{
   public function list(){
       $list = Message::orderBy('created_at','asc')->get();
       return view('Admin.Chat.list',compact('list'));
   }
   public function post_message(Request $request){
        $mes = new Message();
        $mes->user_id = Auth::guard('admin')->id();
        $mes->content = $request->message;
        $mes->created_at = Carbon::now();
        $date = DateHelper::datetime(Carbon::now());
        $mes->save();
//        dd($request->all());
//        broadcast(new RedisEvent($mes));

        return response()->json(['message'=>$mes,'admin'=>$mes->admin,'user_detail'=>$mes->user->admin_detail,'date'=>$date],200);
   }
}
