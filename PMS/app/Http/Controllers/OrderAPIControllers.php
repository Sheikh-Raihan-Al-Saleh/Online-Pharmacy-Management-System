<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class OrderAPIControllers extends Controller
{
    public function getOrder()
    {
        $data=order::all();
        return response()->json($data);
    }
    public function getOrderid(Request $req)
    {
        $o=order::where('c_id',$req->c_id)->first();
        return response()->json($o);

    }
    public function addOrder(Request $req)
    {
            $o=new order();
            $o->c_id=$req->c_id;
            $o->p_id=$req->p_id;
            $o->p_name=$req->p_name;
            $o->quantity=$req->quantity;
            $o->price=$req->price;
            $o->payment=$req->payment;

            
            if($o->save())
       {
           return response()->json(["msg"=>"Added to orderlist"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);
       
        
    }
    public function deleteOrder(Request $req)
    {
        $o=order::where('c_id',$req->c_id)->delete();
        return response()->json(["msg"=>"Order Cancelled"]);
    }
   
}
