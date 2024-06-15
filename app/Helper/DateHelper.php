<?php
namespace App\Helper;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class DateHelper{


public static function month_year($date){
//    dd($date);
    if($date == null){
        return "Hiện tại";
    }
    return \Illuminate\Support\Carbon::parse($date)->format('m/Y');
}
public static function date($date){
    if($date == null){
        return "Hiện tại";
    }
    return \Illuminate\Support\Carbon::parse($date)->format('d/m/Y');
}
public static function datetime($date){
    if($date == null){
        return "Hiện tại";
    }
    return \Illuminate\Support\Carbon::parse($date)->format('d/m/Y H:i');
}
public static function str_to_date($str){
    if($str == null) return null;
    $date= Carbon::createFromFormat('d/m/Y',$str);
    return $date->format('Y-m-d');
}
public static function date_to_str($date) {
    return Carbon::parse($date)->format('d/m/Y');
}

public static function checksearch ($data ,$count) {
    foreach ($data as $item) {
        if (empty($item) ) {
            unset($item);
        }
    }
    if (count($data) && !$count) {
        Toastr::error('Không tìm thấy!');
    }
}
}
