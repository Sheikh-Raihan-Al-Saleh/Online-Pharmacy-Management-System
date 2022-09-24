<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartAPIControllers extends Controller
{
    public function getCart()
    {
        $data=Cart::all();
        return response()->json($data);
    }
    public function deleteCart(Request $req)
    {
        $ca=Cart::where('p_id',$req->p_id)->delete();
        return response()->json(["msg"=>"Deleted from cart successfully"]);
    }
    public function addCart(Request $req)
    {
            $ca=new cart();
            $ca->c_id=$req->c_id;
            $ca->p_id=$req->p_id;
            $ca->p_name=$req->p_name;
            $ca->quantity=$req->quantity;
            $ca->price=$req->price*$req->quantity;
            if($ca->save())
       {
           return response()->json(["msg"=>"Added to cart"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);
       
        
    }
    public function editCart(Request $req)
    {

            $ca=Cart::where('c_id',$req->c_id)->first();
            $ca->c_id=$req->c_id;
            $ca->p_id=$req->p_id;
            $ca->p_name=$req->p_name;
            $ca->quantity=$req->quantity;
            $ca->price=$req->price*$req->quantity;
            if($ca->save())
       {
           return response()->json(["msg"=>"cart Updated"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);
    
        
    }
}
