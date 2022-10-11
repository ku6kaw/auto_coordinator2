<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Pant extends Model
{
    use HasFactory;
    protected $fillable=[
        "length",
        "color",
        "image"
    ];
    public static function get_user_pants_By_Updated_at(){
        $user_id=Auth::id();
        return self::where("user_id",$user_id)
        ->orderBy("created_at","desc")
        ->get();
    }
    public static function get_search_user_pants($length){
       $user_id=Auth::id();
        return self::where("user_id",$user_id)
        ->where("length",intval($length))
        ->get();
    }
    
    
}
