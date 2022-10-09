<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Cloth extends Model
{
    use HasFactory;
    protected $table="clothes";
    protected $fillable=[
        "sleeve",
        "color",
        "image"
    ];
    public static function get_user_clothes(){
        $user_id=Auth::user();
        return self::where("user_id",$user_id)->get();
    }
    
}
