<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Sendmail;
use Illuminate\Support\facades\Mail;

class MAilAPIControllers extends Controller
{
    public function Customermail()
    {
        $e_sub="Suucessfully send email";
        $e_body="Thank you for your purchase!! ";
        
        Mail::to('odrib02@gmail.com')->send(new Sendmail($e_sub, $e_body));
        return response()->json(["msg"=>"Mail sent successfully"]);
    }         
}

