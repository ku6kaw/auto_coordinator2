<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jacket extends Model
{
    use HasFactory;
    protected $fillable=[
        "color",
        "image"
    ];
    public static function get_user_jackets(){
        $user_id=Auth::user();
        return self::where("user_id",$user_id)->get();
    }
    
}
