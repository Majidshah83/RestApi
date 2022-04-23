<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dbstores;
class DbController extends Controller

{
    public function store(Request $request)
    {

        $product=new Dbstores;
        $product->name=$request->input('name');
        $product->email=$request->input('email');
        $product->password=$request->input('password');
        $product->save();
        if(!$product)
        {
            return response()->json(['success'=>false, 'message' => 'Add Podcuct Fail please try again']);
        }
        return response()->json(['success'=>true, 'message' => ' Podcuct Add successfully']);



    }
    public function getapi($id)
    {

    $product=Dbstores::where('id',$id)->first();
    return response()->json(['message' => "Data get Successfully","data" => $product]);


    }
    public function getAll()
    {
         $product=Dbstores::all();
          return response()->json(['message' => "Data get All Products","data" => $product]);

    }


}
