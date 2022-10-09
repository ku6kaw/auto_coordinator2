<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pant extends Model
{
    use HasFactory;
    protected $fillable=[
        "length",
        "color",
        "image"
    ];
    public static function get_user_pants(){
        $user_id=Auth::user();
        return self::where("user_id",$user_id)->get();
    }
    
    
}
