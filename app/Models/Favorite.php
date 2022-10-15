<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;


class Favorite extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "cloth_id",
        "pants_id",
        "jacket_id"
    ];
    public static function favorite_coordinate(){
        $user_id=Auth::id();
                                
    }


}
