<?php
namespace App\Helper;

class Helper
{
    public static function toCollection($data){
        return collect(json_decode(json_encode($data)));
    } 

    public static function ErrorToast($message){
        return [
            'title' => $message,
            'timer'=>3000,
            'icon'=>'error',
            'toast'=>true,
            'position'=>'top-right',
            'showConfirmButton' => false
        ];
    }
    
    public static function SuccessToast($message){
        return [
            'title' => $message,
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right',
            'showConfirmButton' => false
        ];
    }
}