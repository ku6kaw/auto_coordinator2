<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jacket;
use Validator;
use Auth;
use Storage;
class JacketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Jackets = Jacket::get_user_Jackets_By_Updated_at();
        return view('jackets.index',compact("Jackets"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jackets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color' => 'required',
            'image'=>'required'
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('jackets.create')
            ->withInput()
            ->withErrors($validator);
        }
        $image=$request->file('image')->store("jackets","public");
        /*返り値に新たに作ったファイルのpathを返す。*/

        $create_request=["user_id"=>Auth::id(),
                    "color"=>$request->all()["color"],
                    "image"=>$image];
            /*文字列の数字をint型に変換*/
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Jacket::create($create_request);
        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('jackets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Jacket= Jacket::find($id);
        return view('jackets.show', compact('Jacket'));
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
        $delete_jacket=Jacket::find($id);
        \Storage::disk('public')->delete($delete_jacket->image);
        $result = $delete_jacket->delete();
        return redirect()->route('jackets.index');
    }
}
