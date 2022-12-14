<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cloth;
use App\Models\Pant;
use App\Models\Jacket;
use Auth;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cloth_exist_bool = false;
        $pants_exist_bool = false;
        $jacket_exist_bool = false;

        $coordinate_info = $request->all();
        
        //服の配列
        $clothes_array = Cloth::get_search_user_clothes($coordinate_info["sleeve"]) 
            ->all();
        //ズボンの配列
            $pants_array = Pant::get_search_user_pants($coordinate_info["pants"])
            ->all();

        //ランダムに服を選択
        if($clothes_array != null){
            $cloth_index = array_rand($clothes_array); //ランダムに配列のindexを取り出す
            $suitable_cloth = $clothes_array[$cloth_index]; //上の乱数と一致するidをもつ服を選択
        }else{
            $cloth_exist_bool = true;
        }
        //ランダムにズボンを選択
        if($pants_array != null){
            $pant_index = array_rand($pants_array); //ランダムに配列のindexを取り出す
            $suitable_pant = $pants_array[$pant_index]; //上の乱数と一致するidをもつズボンを選択
        }else{
            $pants_exist_bool = true;
        }

        if(intval($coordinate_info["jacket"]) == 1){ //need jacketを選択したとき
            $jackets_array=Jacket::where("user_id",Auth::id())->get()->all();
            //ランダムにジャケットを選択
            if($jackets_array!=null){
                $jacket_index=array_rand($jackets_array);
                $suitable_jacket=$jackets_array[$jacket_index];
            }else{
                $jacket_exist_bool=true;
            }
        }else{
            $suitable_jacket=null;
        }

        //服、ズボン、上着が存在しなければエラーメッセージを表示
        if($cloth_exist_bool||$pants_exist_bool||$jacket_exist_bool){
            return redirect(route('search.input'))->with(["cloth_exist_bool"=>$cloth_exist_bool,
                                                        "pants_exist_bool"=>$pants_exist_bool,
                                                        "jacket_exist_bool"=>$jacket_exist_bool]);
        }
        return view("search.result",compact("suitable_cloth",
                                            "suitable_pant",
                                            "suitable_jacket"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('search.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
