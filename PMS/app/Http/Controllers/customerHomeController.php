<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\product;
use App\Models\cart;
use App\Models\order;

class customerHomeController extends Controller
{
    public function c_home()
    {
        $c_id=session()->get('logged');
        $c=Customer::where('c_id',$c_id)->first();
        //return $a;
        return view('customer.home')->with('c',$c);
    }
    public function customerprofile()
    {
        $c_id=session()->get('logged');
        $c=Customer::where('c_id',$c_id)->first();
        return view('customer.cprofile')->with('c',$c);
    }
    public function customeredit()
    {
        $c_id=session()->get('logged');
        $c=Customer::where('c_id',$c_id)->first();
        return view('customer.edit')->with('c',$c);
    }
    public function editSubmit(Request $req)
    {
        
    
        $c=Customer::where('c_id',$req->c_id)->first();
        $c->name =$req->name;
        $c->username =$req->username;
        $c->c_id =$req->c_id;
        $c->address=$req->address;
        $c->role =$req->role;
        $c->email =$req->email;
        $c->save();
        return redirect()->route('customer.cprofile');

    }
    public function list()
    {
        
        $p=product::all(); 
        return view('customer.productlist')->with('p',$p);
    }
    public function Addtocart(Request $req)
    {
        $ca=cart::where('c_id','=',session()->get('logged'))->where('p_name','=',$req->p_name)->first();
        if($ca)
        {
            $ca->quantity+=1;          
            $ca->save();

        }
        else{
            $ca=new cart();
            $ca->c_id=session()->get('logged');
            $ca->p_id=$req->p_id;
            $ca->p_name=$req->p_name;
            $ca->quantity=$req->quantity;
            $ca->price=$req->price;
            $ca->save();
            
        }
        
        return redirect()->route('customer.cart');
    }
    public function cart(){
        $p=cart::where('c_id','=',session()->get('logged'))->get();
        $totalprice=0;
        foreach($p as $eachproduct){
            //$price=$eachproduct->quantity * $eachproduct->price;
            $totalprice=$totalprice+($eachproduct->quantity * $eachproduct->price);
        }
        
        return view('customer.cart')
        ->with('p',$p)
        ->with("totalprice",$totalprice);

    }
    public function cancel(Request $req)
    {
        $ca=cart::where('p_id',$req->p_id)->delete();
       // $o=order::where('p_id',$req->p_id)->delete();
        session()->flash('msg','Orders Removed succcessfully');
        return redirect()->route('customer.cart');
    }
    public function payment(Request $req)
    {
        $c_id=session()->get('logged');
        $p=cart::where('c_id',$c_id)->first();
        return view('customer.payment')->with('p',$p);
    }
    
    
    public function order(Request $req)
    {
        //$ca=cart::where('c_id','=',session()->get('logged'))->where('p_name','=',$req->p_name)->first();
            
            $o=new order();
            $o->c_id=$req->c_id;
            $o->p_id=$req->p_id;
            $o->p_name=$req->p_name;
            $o->quantity=$req->quantity;
            $o->price=$req->price;
            $o->payment=$req->payment;
            //$o->totalprice=$req->totalprice;
            $o->save(); 
            $ca=cart::where('p_id',$req->p_id)->delete();
            session()->flash('msg','Order Placed succcessfully'); 
            
        return redirect()->route('customer.cart');
    }
    
    // public function Ordercancel(Request $req)
    // {
    //     $o=order::where('p_id',$req->p_id)->delete();
    //     session()->flash('msg','Order Cancel succcessfully');
    //     return redirect()->route('customer.cart');
    // }
  
}
