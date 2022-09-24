<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\product;
use App\Models\Customer;
use App\Models\Seller;
use App\Models\sell;

class adminHomecontroller extends Controller
{
    //
    public function home()
    {
        $a_id=session()->get('logged');
        $a=Admin::where('a_id',$a_id)->first();
        //return $a;
        return view('admin.home')->with('a',$a);


    } 
    public function adminprofile()
    {
        $a_id=session()->get('logged');
        $a=Admin::where('a_id',$a_id)->first();
        return view('admin.profile')->with('a',$a);
    }
    public function adminedit()
    {
        $a_id=session()->get('logged');
        $a=Admin::where('a_id',$a_id)->first();
        return view('admin.edit')->with('a',$a);
    }
    public function editSubmit(Request $req)
    {
    
        $a=Admin::where('a_id',$req->a_id)->first();
        $a->name =$req->name;
        $a->username =$req->username;
        $a->a_id =$req->a_id;
        $a->role =$req->role;
        $a->email =$req->email;
        $a->save();
        return redirect()->route('admin.profile');

    }
    public function addproduct()
    {
        return view('admin.Addproduct');
    }
    public function productSub(Request $req)
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
                $p=new product();
                $p->p_name =$req->p_name;
                $p->p_id=$req->p_id;
                $p->description =$req->description;
                $p->quantity =$req->quantity;
                $p->price =$req->price;

                $p->save();
            
            
            //session()->flash('msg','insertion successful');
            return redirect()->route('admin.productlist');
            
    }
    public function list()
    {
        
        $p=product::all(); 
        return view('admin.productlist')->with('p',$p);
    }
    public function clist()
    {
        
        $c=customer::all(); 
        return view('admin.customerlist')->with('c',$c);
    }
    public function cdelete(Request $req)
    {
        $c=customer::where('c_id',$req->c_id)->delete();
        return redirect()->route('admin.customerlist');
    }
    public function slist()
    {
        
        $s=Seller::all(); 
        return view('admin.sellerlist')->with('s',$s);
    }
    public function sdelete(Request $req)
    {
        $s=Seller::where('s_id',$req->s_id)->delete();
        return redirect()->route('admin.sellerlist');
    }

    public function selleredit(Request $req)
    {
        $s=Seller::where('s_id','=',$req->s_id)->first();
        return view('admin.editseller')->with('s',$s);
    }
    public function sellereditSubmit(Request $req)
    {
    
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z.]+$/',
                's_id'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
                'username'=>'required',
                'email'=>'required',
                'role'=>'required'

            ],
            [
               
            ]
        );
        $s=Seller::where('s_id',$req->s_id)->first();
        $s->s_id =$req->s_id;
        $s->name =$req->name;
        $s->username =$req->username;
        $s->address =$req->address;
        $s->email =$req->email;
        $s->role =$req->role;
        $s->save();
        return redirect()->route('admin.sellerlist');

    }
    public function selllist()
    {
        
        $se=sell::all(); 
        $totalsell=0;
        $totalquantity=0;
        foreach($se as $eachproduct){
            //$price=$eachproduct->quantity * $eachproduct->price;
            $totalsell=$totalsell+($eachproduct->price);
            $totalquantity=$totalquantity+($eachproduct->quantity);
        }
        return view('admin.productsells')
        ->with('se',$se)
        ->with("totalsell",$totalsell)
        ->with("totalquantity",$totalquantity);
    }
    public function delete(Request $req)
    {
        $se=sell::where('p_id',$req->p_id)->delete();
        session()->flash('msg','Info deleted');
        return redirect()->route('admin.productsells');
    }
    public function search(Request $req)
    {
        $p=product::where('p_name','LIKE',"%{$req->search}%")->get();
        return view('admin.productlist')
        ->with('p',$p);
    }
   
}