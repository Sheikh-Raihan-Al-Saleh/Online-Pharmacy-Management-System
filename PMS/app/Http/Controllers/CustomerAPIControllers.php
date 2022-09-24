<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerAPIControllers extends Controller
{
    public function getCustomer()
    {
        $data=Customer::all();
        return response()->json($data);
    }
    public function getCustomerid(Request $req)
    {
        $c=Customer::where('c_id',$req->c_id)->first();
        return response()->json($c);

    }
    public function addCustomer(Request $req)     
    {
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z.]+$/',
                'c_id'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
                'username'=>'required',
                'address'=>'required',
                'email'=>'required',
                'role'=>'required',
                'password'=>'required'

            ],
            [
               
            ]
        );
       $c=new Customer();
       $c->name = $req->name;
       $c->username = $req->username;
       $c->email = $req->email;
       $c->c_id = $req->c_id;
       $c->address = $req->address;
       $c->role = $req->role;
       $c->password =md5($req->password);
       $c->image="storage/profile_pics/jadid12.jpg";
       if($c->save())
       {
           return response()->json(["msg"=>"Added"]);
       }
       return response()->json(["msg"=>"Not added"]);

    }
    public function deleteCustomer(Request $req)
    {
        $c=Customer::where('c_id',$req->c_id)->delete();
        return response()->json(["msg"=>"Deleted successfully"]);
    }
    public function editCustomer(Request $req)
    {
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z.]+$/',
                'c_id'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
                'username'=>'required',
                'address'=>'required',
                'email'=>'required',
                'role'=>'required',
                'password'=>'required'

            ],
            [
               
            ]
        );
        $c=Customer::where('c_id',$req->c_id)->first();
        $c->name = $req->name;
        $c->username = $req->username;
        $c->c_id = $req->c_id;
        $c->role = $req->role;
        $c->address=$req->address;
        $c->email = $req->email;
        $c->password =md5($req->password);
        $c->image="storage/profile_pics/jadid12.jpg";
        if($c->save())
       {
           return response()->json(["msg"=>"Customer Profile Updated"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);

    }
    
}
