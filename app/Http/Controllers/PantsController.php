<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pant;
use Validator;
use Auth;
use Storage;
class PantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pants = Pant::get_user_Pants_By_Updated_at()->all();
        $long_pants=[];
        $short_pants=[];
        foreach($Pants as $pant){
            if($pant->length==0){
                array_push($long_pants,$pant);
            }
            else{
                array_push($short_pants,$pant);
            }
        }
        return view('pants.index',compact("long_pants","short_pants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('pants.create');
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
            ->route('pants.create')
            ->withInput()
            ->withErrors($validator);
        }
        $image=$request->file('image')->store("pants","public");
        /*返り値に新たに作ったファイルのpathを返す。*/

        $create_request=["user_id"=>Auth::id(),
                    "length"=>intval($request->all()["pants"]),
                    "color"=>$request->all()["color"],
                    "image"=>$image];
            /*文字列の数字をint型に変換*/
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Pant::create($create_request);
        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('pants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pant = Pant::find($id);
        return view('pants.show', compact('pant'));
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
         $delete_pant=Pant::find($id);
        \Storage::disk('public')->delete($delete_pant->image);
        $result = $delete_pant->delete();
        return redirect()->route('pants.index');
    }
}
