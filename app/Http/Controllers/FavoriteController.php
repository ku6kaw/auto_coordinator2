<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorite_coordinates=Favorite::get_favorite_coordinates();
        /*多次元配列で返ってくる*/
        $favorite_clothes=[];
        $favorite_pants=[];
        $favorite_jackets=[];
        foreach($favorite_coordinates as $favorite_coordinate){
        array_push($favorite_clothes,["id"=>$favorite_coordinate["id"],
                                    "favorite_info"=>$favorite_coordinate["cloth_info"]]);
        array_push($favorite_pants,["id"=>$favorite_coordinate["id"],
                                    "favorite_info"=>$favorite_coordinate["pants_info"]]);
        array_push($favorite_jackets,["id"=>$favorite_coordinate["id"],
                                    "favorite_info"=>$favorite_coordinate["jacket_info"]]);
        /*$favorite_pants[]=$favorite_coordinate["pants_info"];
        $favorite_jackets[]=$favorite_coordinate["jacket_info"];*/
        }
        /*favoriteされている情報を全権取得してそれぞれ配列に入れている*/
        return view("favorites.index",compact("favorite_clothes",
                                            "favorite_pants",
                                            "favorite_jackets"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->all()["jacket_id"])){
            $result = Favorite::create($request->all());
        }
        else{
            $data=$request->merge(["jacket_id"=>null])->all();
            $result=Favorite::create($data);
            /*ジャケットがない場合にお気に入りにするときの処理
            データベースにはnullを保存している。*/
        }
        return redirect()->route('favorites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_favorite=Favorite::get_one_favorite_coordinate($id);
        return view("favorites.show",compact("detail_favorite"));
    /*viewからfavoriteテーブルのidを取得。そのidをFavoriteモデルに渡し検索をかける*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_cloth=Favorite::find($id)->delete();
        return redirect()->route('favorites.index');
    }
}
