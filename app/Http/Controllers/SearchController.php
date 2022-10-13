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
        $coordinate_info=$request->all();
        $clothes_array=Cloth::get_search_user_clothes($coordinate_info["sleeve"])
                                ->all();
        $pants_array=Pant::get_search_user_pants($coordinate_info["pants"])
                                ->all();
        if($clothes_array!=null){
        $cloth_index=array_rand($clothes_array);
        $suitable_cloth=$clothes_array[$cloth_index];
        }
        else{
            return redirect(route('search.input'));
        }
        if($pants_array!=null){
        $pant_index=array_rand($pants_array);
        $suitable_pant=$pants_array[$pant_index];
        }
        else{
            return redirect(route('search.input'));
        }
        if(intval($coordinate_info["jacket"])==1){
            $jackets_array=Jacket::where("user_id",Auth::id())->get()->all();
            if($jackets_array!=null){
                $jacket_index=array_rand($jackets_array);
                $suitable_jacket=$jackets_array[$jacket_index];
            }
            else{
                return redirect(route('search.input'));
            }
            }
        else{
            $suitable_jacket=null;
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
