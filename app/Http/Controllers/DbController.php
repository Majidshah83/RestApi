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
    return response()->json(["data" => $product,'message' => "Data get Successfully"]);


    }
   public function getapi2(Request $request)
   {
       $product=Dbstores::where('id',$request->id)->first();

   }
// fatech data
    public function getAll()
    {
         $product=Dbstores::all();
          return response()->json(['message' => "Data get All Products","data" => $product]);

    }
// login api
    public function postLogin(Request $request)
    {
        $login=User::where('email',$request->email)->where('password',$request->password)->first();
        if($login)
        {
            Auth::login($login);
            return response()->json(['message'=>"login success",'data'=>$login]);

        }
        else{
            return response()->json(['message'=>"Not login success"]);

        }


    }
  public function destroy($id)
  {
      $result=Dbstores::find($id);
    if($result)
    {
      $result->delete();
      return response()->json(['messgae'=>"Data delete successfully"]);
    }
    else{
         return response()->json(['messgae'=>"Data not delete successfully"]);
    }
  }

}
