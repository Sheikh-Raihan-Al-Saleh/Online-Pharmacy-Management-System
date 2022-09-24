<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Seller;
class HomeController extends Controller
{
    //
    public function home()
    {
        return view('home.home');
    }
    public function aboutus()
    {
        return view('home.aboutus');
    }
    public function login()
    {
        return view('home.login');
    }
    public function registration()
    {
        return view('home.registration');
    }
   
    public function regiSubmit(Request $req)
    {
        //return $req->file('pro_image')->getClientOriginalName();
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z.]+$/',
                'username'=>'required',
                'email'=>'email',
                'id'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
                'address'=>'required',
                'role'=>'required',
                'password'=>'required',
                'conf_password'=>'required|same:password',
                'pro_image'=>'required|mimes:jpg,png,jpeg'

            ],
            [
               'id.regex'=>'please follow xx-xxxxx-x pattern'
               
            ]
        );
           
            $fileName=$req->username.'.'.$req->file('pro_image')->getClientOriginalExtension();
            $req->file('pro_image')->storeAs('public/profile_pics',$fileName);
            if($req->role=="customer")
            {
                $c=new Customer();
                $c->name =$req->name;
                $c->username =$req->username;
                $c->email =$req->email;
                $c->c_id =$req->id;
                $c->address=$req->address;
                $c->role=$req->role;
                $c->password =md5($req->password);
                $c->image="storage/profile_pics/".$fileName;
                $c->save();
            }
            elseif($req->role=="seller")
            {
                $s=new Seller();
                $s->name =$req->name;
                $s->username =$req->username;
                $s->email =$req->email;
                $s->s_id =$req->id;
                $s->address=$req->address;
                $s->role=$req->role;
                $s->password = md5($req->password);
                $s->image="storage/profile_pics/".$fileName;
                $s->save();
            }
            
            session()->flash('msg','Registration succcessful');
            return redirect()->route('login');
            
            
            //$req->file('pro_image')->store('uploads');
            
            //return view('login');

    }
    public function loginSubmit(Request $req)
    {
        $validation = $req->validate(
            [
                'role'=>'required',
                'id'=>'required|string',
                'password'=>'required|string',
            ],
            [
                'id.required'=>'Please give valid user id!'
            ]
        );
        $a = null;
        $c = null;
        $s = null;
        if($req->role=="admin"){
            $a=Admin::where('a_id',$req->id)
                           ->where('password',md5($req->password))
                           ->first();
        }
        elseif($req->role=="customer"){
            $c=Customer::where('c_id', $req->id)
                           ->where('password',md5($req->password))
                           ->first();
        }
        elseif($req->role=="seller"){
            $s=Seller::where('s_id', $req->id)
                           ->where('password',md5($req->password))
                           ->first();
        }
        
        if($req->role=="admin" && $a!=null){
            session()->put('logged',$a->a_id);
            //return $a;
            return redirect()->route('admin.home');
        }
        elseif($req->role=="customer" && $c!=null){
            session()->put('logged',$c->c_id);
            return redirect()->route('customer.home');
            //return $c;
        }
        elseif($req->role=="seller" && $s!=null){
            session()->put('logged',$s->s_id);
            return redirect()->route('seller.home');
            //return $c;
        }
       else
       {
        session()->flash('msg','Username & Password Invalid');
        return redirect()->route('login');
       }
        
    }
    public function logout()
    {
        session()->forget('a_id');
        session()->forget('c_id');
        session()->forget('s_id');
        return redirect()->route('login');
    }

}
