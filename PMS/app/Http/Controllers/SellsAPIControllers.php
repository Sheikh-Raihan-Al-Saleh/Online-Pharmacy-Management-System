<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sell;

class SellsAPIControllers extends Controller
{
    public function getSellProductlist()
    {
        $data=sell::all();
        return response()->json($data);
    }
    public function getSellProductid(Request $req)
    {
        $se=sell::where('p_id',$req->p_id)->first();
        return response()->json($se);

    }
    public function delete(Request $req)
    {
        $se=Sell::where('p_id',$req->p_id)->delete();
        return response()->json(["msg"=>"Deleted successfully"]);
    }
}
