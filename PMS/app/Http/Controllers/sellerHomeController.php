<?php

namespace App\Http\Controllers;
use App\Models\Seller;
use App\Models\product;
use App\Models\order;
use App\Models\sell;


use Illuminate\Http\Request;

class sellerHomeController extends Controller
{
    public function s_home()
    {
        $s_id=session()->get('logged');
        $s=Seller::where('s_id',$s_id)->first();
        //return $a;
        return view('seller.home')->with('s',$s);
    }
    public function sellerprofile()
    {
        $s_id=session()->get('logged');
        $s=Seller::where('s_id',$s_id)->first();
        return view('seller.sprofile')->with('s',$s);
    }
    public function selleredit()
    {
        $s_id=session()->get('logged');
        $s=Seller::where('s_id',$s_id)->first();
        return view('seller.edit')->with('s',$s);
    }
    public function editSubmit(Request $req)
    {
    
        $s=Seller::where('s_id',$req->s_id)->first();
        $s->name =$req->name;
        $s->username =$req->username;
        $s->s_id =$req->s_id;
        $s->address=$req->address;
        $s->role =$req->role;
        $s->email =$req->email;
        $s->save();
        return redirect()->route('seller.sprofile');

    }
    public function list()
    {
        
        $p=product::all(); 
        return view('seller.productlist')->with('p',$p);
    }
    public function productedit(Request $req)
    {
        $p=product::where('p_id','=',$req->p_id)->first();
        return view('seller.editproduct')->with('p',$p);
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
        return redirect()->route('seller.productlist');

    }
    public function getorder(Request $req)
    {
        $o=order::all();
        return view('seller.order')->with('o',$o);
    }
    public function sells(Request $req)
    {
        $se=new sell();
        $se->p_id=$req->p_id;
        $se->p_name=$req->p_name;
        $se->quantity=$req->quantity;
        $se->price=$req->price;
        $se->payment=$req->payment;
        $se->save(); 
        $o=order::where('p_id',$req->p_id)->delete();
        session()->flash('msg','Order shipped'); 
        
    return redirect()->route('seller.order');
    }
    

}
