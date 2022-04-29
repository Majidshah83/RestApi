<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dbstores;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DbController extends Controller

{
    //insert Api
    public function store(Request $request)
    {

        $product=new Dbstores;
        $product->name=$request->input('name');
        $product->uuid=Str::uuid()->toString();
        $product->email=$request->input('email');
        $product->password = Hash::make($request->password);
        $product->save();
        if(!$product)
        {
            return response()->json(['success'=>false, 'message' => 'Add Podcuct Fail please try again']);
        }
        return response()->json(['success'=>true, 'message' => ' Podcuct Add successfully']);



    }
    //Eit  data though id
    public function getapi($id)
    {

    $product=Dbstores::where('uuid',$id)->first();
    if($product)
    {
     return response()->json(['success'=>true,"data" => $product,'message' => "Data get Successfully"]);

    }else{
        return response()->json(['success'=>false,"data" => $product,'message' => "Data not found Successfully"]);
    }




    }

// fatech data
    public function getAll()
    {
         $product=Dbstores::all();
         if($product)
         {
           return response()->json(['success'=>true,'message' => "Data get All Products","data" => $product]);
         }
         else{
             return response()->json(['success'=>false,'message' => "Products Not found","data" => $product]);
         }


    }
// login api
    public function postLogin(Request $request)
    {
        $login=User::where('email',$request->email)->where('password',$request->password)->first();
        if($login)
        {
            Auth::login($login);
            return response()->json(['success'=>true,'message'=>"login success",'data'=>$login]);

        }
        else{
            return response()->json(['success'=>false,'message'=>"Not login success"]);

        }


    }
//update api
 public function update(Request $request)
 {
    $product=Dbstores::where('id',$request->id)->first();
    if($product)
    {
        $product->name=$request->input('name');
        $product->uuid=Str::uuid()->toString();
        $product->email=$request->input('email');
        $product->password = Hash::make($request->password);
        $product->update();
       if(!$product)
        {
            return response()->json(['success'=>false, 'message' => 'Update Podcuct Fail please try again']);
        }
        return response()->json(['success'=>true, 'message' => ' Podcuct Update successfully']);

    }


 }


// delete api
  public function destroy($id)
  {
      $result=Dbstores::find($id);
    if($result)
    {
      $result->delete();
      return response()->json(['success'=>true,'messgae'=>"Data delete successfully"]);
    }
    else{
         return response()->json(['success'=>false,'messgae'=>"Data not delete successfully"]);
    }
  }

}