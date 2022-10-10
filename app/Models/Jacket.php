<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Jacket extends Model
{
    use HasFactory;
    protected $fillable=[
        "color",
        "image"
    ];
    public static function get_user_jackets_By_Updated_at(){
         $user_id=Auth::id();
        return self::where("user_id",$user_id)
        ->orderBy("created_at","desc")
        ->get();
    }
    
}
