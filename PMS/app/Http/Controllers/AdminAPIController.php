<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;


class AdminAPIController extends Controller
{
   
    public function getAdmin()
    {
        $data=Admin::all();
        return response()->json($data);

    }
    public function getAdminid(Request $req)
    {
        $a=Admin::where('a_id',$req->a_id)->first();
        return response()->json($a);

    }
   
    public function addAdmin(Request $req)     
    {
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z.]+$/',
                'a_id'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
                'username'=>'required',
                'email'=>'required',
                'role'=>'required',
                'password'=>'required'

            ],
            [
               
            ]
        );
      

        
       $a=new Admin();
       $a->name = $req->name;
       $a->username = $req->username;
       $a->a_id = $req->a_id;
       $a->role = $req->role;
       $a->email = $req->email;
       $a->password =md5($req->password);
       $a->image="storage/profile_pics/SkNabil.jpg";
       if($a->save())
       {
           return response()->json(["msg"=>"Admin Added"]);
       }
       return response()->json(["msg"=>"Create Admin Failed"]);

    }
    public function editAdmin(Request $req)
    {
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z.]+$/',
                'a_id'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
                'username'=>'required',
                'email'=>'required',
                'role'=>'required',
                'password'=>'required'

            ],
            [
               
            ]
        );
    
        $a=Admin::where('a_id',$req->a_id)->first();
        $a->name = $req->name;
        $a->username = $req->username;
        $a->a_id = $req->a_id;
        $a->role = $req->role;
        $a->email = $req->email;
        $a->password =md5($req->password);
        $a->image="storage/profile_pics/SkNabil.jpg";
        if($a->save())
       {
           return response()->json(["msg"=>"Admin Profile Updated"]);
       }
       return response()->json(["msg"=>"Operation Failed"]);

    }
    public function deleteAdmin(Request $req)
    {
        $a=Admin::where('a_id',$req->a_id)->delete();
        return response()->json(["msg"=>"Admin Account Deleted successfully"]);
    }

}
