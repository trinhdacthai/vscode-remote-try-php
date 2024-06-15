<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class ParamController extends Controller
{
    public function get_designation(Request $request,$id){
        $value = Designation::where('department_id',$id)->get();
        return response()->json(['data'=>$value],200);
    }
}
