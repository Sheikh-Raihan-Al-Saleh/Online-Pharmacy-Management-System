<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Sendmail;
use Illuminate\Support\facades\Mail;

class MAilAPIControllers extends Controller
{
    public function mail()
    {
        $e_sub="Suucessfully send email";
        $e_body="Thank you for use our service!! ";
        
        Mail::to('sheikhraihan57@gmail.com')->send(new Sendmail($e_sub, $e_body));
        return response()->json(["msg"=>"Mail sent successfully"]);
    }         
}
