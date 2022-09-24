<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    public function productedit(Request $req)
    {
        $p=product::where('p_id','=',$req->p_id)->first();
        return view('admin.editproduct')->with('p',$p);
    }
    public function producteditSubmit(Request $req)
    {
    
        $req->validate(
            [
                'p_name'=>'required|regex:/^[A-Z a-z.]+$/',
                'p_id'=>'required|regex:/^[p]-[0-9]{2}$/',
                'description'=>'required',
                'quantity'=>'required',
                'price'=>'required'

            ],
            [
               
            ]
        );
        $p=product::where('p_id',$req->p_id)->first();
        $p->p_id =$req->p_id;
        $p->p_name =$req->p_name;
        $p->description =$req->description;
        $p->quantity =$req->quantity;
        $p->price =$req->price;
        $p->save();
        return redirect()->route('admin.productlist');

    }
    public function delete(Request $req)
    {
        $p=product::where('p_id',$req->p_id)->delete();
        return redirect()->route('admin.productlist');
    }
    public function Addcart(Request $req)
    {
        $p=product::where('p_id','=',$req->p_id)->first();
        return view('customer.cart')->with('p',$p);
    }
   
}
