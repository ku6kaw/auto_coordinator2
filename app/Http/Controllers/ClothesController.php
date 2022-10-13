<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Cloth;

class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clothes = Cloth::getAllOrderByUpdated_at();
        return view('clothes.index',compact('clothes'));
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
            'clothes' => 'required',
            'sleeve' => 'required',
            //'color' => 'required',
            'image' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('clothes.create')
            ->withInput()
            ->withErrors($validator);
        }

        //フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        
        $image = $request->file('image');

        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Cloth::create($data);

        //storage/app/publicに画像を保存
        $path = \Storage::put('/public', $image); 
        
        $dir = 'image';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $clothes = new Cloth();
        $clothes->user_id = $data['user_id'];
        //$clothes->sleeve = $data['sleeve'];
        //$clothes->color = $data['color'];
        $clothes->image = 'storage/' . $dir . '/' . $file_name;
        $clothes->save();

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
        //
    }
}
