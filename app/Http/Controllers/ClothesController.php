<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Cloth;
use Auth;
class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clothes = Cloth::get_user_clothes_By_Updated_at()->all();
        $long_sleeves=[];
        $short_sleeves=[];
        foreach($clothes as $cloth){
            if($cloth->sleeve==0){
                array_push($long_sleeves,$cloth);
            }
            else{
                array_push($short_sleeves,$cloth);
            }
        }
        return view('clothes.index',compact("long_sleeves","short_sleeves"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('clothes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'color' => 'required',
            'image'=>'required'
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('clothes.create')
            ->withInput()
            ->withErrors($validator);
        }
        $image=$request->file('image')->store("clothes","public");
        /*返り値に新たに作ったファイルのpathを返す。*/

        $create_request=["user_id"=>Auth::id(),
                    "sleeve"=>intval($request->all()["sleeve"]),
                    "color"=>$request->all()["color"],
                    "image"=>$image];
            /*文字列の数字をint型に変換*/
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Cloth::create($create_request);
        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('clothes.index');
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
        $result = Cloth::find($id)->delete();
        return redirect()->route('clothes.index');
    }
}
