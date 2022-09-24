<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Seller;
use App\Models\Login;

class LoginAPIControllers extends Controller
{
    public function login(Request $req)
    {
        $data=Login::all();
        return response()->json($data);  
    }
    public function loginSubmit(Request $req)
    {
        // $validation = $req->validate(
        //     [
        //         'role'=>'required',
        //         'id'=>'required|string',
        //         'password'=>'required|string',
        //     ],
        //     [
        //         'id.required'=>'Please give valid user id!'
        //     ]
        // );
        
            $a=Admin::where('a_id',$req->id)
                           ->where('password',md5($req->password))
                           ->first();
    
        
            $c=Customer::where('c_id', $req->id)
                           ->where('password',md5($req->password))
                           ->first();
        
       
            $s=Seller::where('s_id', $req->id)
                           ->where('password',md5($req->password))
                           ->first();
        
        
        if($req->role=="admin"){
            //return $a;
            $l=new Login();
            $l->id = $req->a_id;
            $l->role = $req->role;
            $l->password =md5($req->password);
            
            if($l->save())
            {
                return response()->json(["msg"=>"true"]);
            }
            //return response()->json(["msg"=>"Admin Logged"]);
        }
        elseif($req->role=="customer"){
            $l=new Login();
            $l->id = $req->c_id;
            $l->role = $req->role;
            $l->password =md5($req->password);
            
            if($l->save())
            {
                return response()->json(["msg"=>"true"]);
            }
            //return $c;
        }
        elseif($req->role=="seller"){
            $l=new Login();
            $l->id = $req->s_id;
            $l->role = $req->role;
            $l->password =md5($req->password);
            
            if($l->save())
            {
                return response()->json(["msg"=>"true"]);
            }
            //return response()->json(["msg"=>"Seller Logged"]);
            //return $c;
        }
       else
       {
        return response()->json(["msg"=>"User Login Failed"]);
       }
    //    $l=new Admin();
    //    $l->a_id = $req->a_id;
    //    $l->role = $req->role;
    //    $l->password =md5($req->password);
       
    //    if($l->save())
    //    {
    //        return response()->json(["msg"=>"User Added"]);
    //    }
        
    }
}
