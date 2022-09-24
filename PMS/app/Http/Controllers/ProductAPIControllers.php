<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductAPIControllers extends Controller
{
    public function getProductlist()
    {
        $data=Product::all();
        return response()->json($data);
    }
    public function getProductid(Request $req)
    {
        $p=Product::where('p_id',$req->p_id)->first();
        return response()->json($p);

    }
    public function addProduct(Request $req)     
    {
       $p=new Product();
       $p->p_id = $req->p_id;
       $p->p_name = $req->p_name;
       $p->description = $req->description;
       $p->quantity = $req->quantity;
       $p->price = $req->price;
       if($p->save())
       {
           return response()->json(["msg"=>"Product Added"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);

    }
    public function deleteProduct(Request $req)
    {
        $p=Product::where('p_id',$req->p_id)->delete();
        return response()->json(["msg"=>"Product Removed from the list"]);
    }
    public function editProduct(Request $req)
    {
    
        $p=product::where('p_id',$req->p_id)->first();
        $p->p_id =$req->p_id;
        $p->p_name =$req->p_name;
        $p->description =$req->description;
        $p->quantity =$req->quantity;
        $p->price =$req->price;
        if($p->save())
       {
           return response()->json(["msg"=>"Product Info Updated"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);

    }
}
