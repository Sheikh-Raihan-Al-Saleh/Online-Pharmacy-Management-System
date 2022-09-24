<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Order;
use App\Models\Sell;
use App\Models\Product;
class SellerAPIControllers extends Controller
{
    public function getSeller()
    {
        $data=Seller::all();
        return response()->json($data);
    }
    public function getSellerid(Request $req)
    {
        $s=Seller::where('s_id',$req->s_id)->first();
        return response()->json($s);

    }
    public function addSeller(Request $req)     
    {
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z.]+$/',
                's_id'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
                'username'=>'required',
                'address'=>'required',
                'email'=>'required',
                'role'=>'required',
                'password'=>'required'

            ],
            [
               
            ]
        );
       $s=new Seller();
       $s->name = $req->name;
       $s->username = $req->username;
       $s->email = $req->email;
       $s->s_id = $req->s_id;
       $s->address = $req->address;
       $s->role = $req->role;
       $s->password =md5($req->password);
       $s->image="storage/profile_pics/Ridwanrahat.jpg";
       if($s->save())
       {
           return response()->json(["msg"=>"Salesman Added"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);

    }
    public function deleteSeller(Request $req)
    {
        $s=Seller::where('s_id',$req->s_id)->delete();
        return response()->json(["msg"=>"Deleted successfully"]);
    }
    public function editSeller(Request $req)
    {
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z.]+$/',
                's_id'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
                'username'=>'required',
                'address'=>'required',
                'email'=>'required',
                'role'=>'required',
                'password'=>'required'

            ],
            [
               
            ]
        );
        $s=Seller::where('s_id',$req->s_id)->first();
        $s->name = $req->name;
        $s->username = $req->username;
        $s->s_id = $req->s_id;
        $s->role = $req->role;
        $s->address=$req->address;
        $s->email = $req->email;
        $s->password =md5($req->password);
        $s->image="storage/profile_pics/Ridwanrahat.jpg";
        if($s->save())
       {
           return response()->json(["msg"=>"Seller Profile Updated"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);

    }
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
    public function editSellerProduct(Request $req)
    {
    
        $p=product::where('p_id',$req->p_id)->first();
        $p->p_id =$req->p_id;
        $p->p_name =$req->p_name;
        $p->description =$req->description;
        $p->quantity =$req->quantity;
        $p->price =$req->price*$req->quantity;
        if($p->save())
       {
           return response()->json(["msg"=>"Product Info Updated"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);

    }
    public function getCustomerOrder()
    {
        $data=order::all();
        return response()->json($data);
    }
    public function getSellProduct()
    {
        $data=sell::all();
        return response()->json($data);
    }
    public function getSellsProductid(Request $req)
    {
        $se=sell::where('p_id',$req->p_id)->first();
        return response()->json($se);

    }
    public function addSellProduct(Request $req)     
    {
        $se=new sell();
        $se->p_id=$req->p_id;
        $se->p_name=$req->p_name;
        $se->quantity=$req->quantity;
        $se->price=$req->price;
        $se->payment=$req->payment;
       if($se->save())
       {
           $o=order::where('p_id',$req->p_id)->delete();
           return response()->json(["msg"=>"Order shipped"]);

       }
       return response()->json(["msg"=>"Product selling failed"]);

    }

}
