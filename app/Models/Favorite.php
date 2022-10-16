<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Cloth;
use App\Models\Pant;
use App\Models\Jacket;



class Favorite extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "cloth_id",
        "pants_id",
        "jacket_id"
    ];
    public static function get_favorite_coordinates(){
        $user_id=Auth::id();
        $favorite_coordinates=self::where("user_id",$user_id)
                            ->get()
                            ->all();
        $favorite_coordinates_ary=[];
        foreach($favorite_coordinates as $favorite_coordinate){
            $favorite_coordinate_ary=[
                "id"=>$favorite_coordinate["id"],
                "cloth_info"=>Cloth::find($favorite_coordinate["cloth_id"]),
                "pants_info"=>Pant::find($favorite_coordinate["pants_id"]),
                "jacket_info"=>Jacket::find($favorite_coordinate["jacket_id"])
            ];
            $favorite_coordinates_ary[]=$favorite_coordinate_ary;
            /*[[コーディネート1の情報],[コーディネート2の情報],[コーディネート3の情報]]
            のような形で入れている*/
        }
        return $favorite_coordinates_ary;   
    }

    public static function get_one_favorite_coordinate($id){
        $favorite_coordinate=self::find($id);
        return $favorite_coordinate_ary=[
            "id"=>$favorite_coordinate["id"],
            "cloth_info"=>Cloth::find($favorite_coordinate["cloth_id"]),
            "pants_info"=>Pant::find($favorite_coordinate["pants_id"]),
            "jacket_info"=>Jacket::find($favorite_coordinate["jacket_id"])
        ];
    }
}
