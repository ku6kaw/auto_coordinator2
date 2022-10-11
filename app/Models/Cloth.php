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
    public static function get_user_clothes_By_Updated_at(){
       $user_id=Auth::id();
        return self::where("user_id",$user_id)
        ->orderBy("created_at","desc")
        ->get();
    }
/*ユーザーの服の情報を取得。最新のものが上に来るように*/
}
    

