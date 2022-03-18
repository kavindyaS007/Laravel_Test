<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Zone;
use App\Models\Region;
use App\Models\Territory;
use App\Models\NewUser;
use App\Models\Product;
use App\Models\podetails;
use App\Models\pomoredetails;

class orderController extends Controller
{
    public function storePO(Request $request){
        $po = new podetails;
        $more = new pomoredetails;

        $more->zone=$request->zcode;

        $po->zone=$request->zone;
        $po->region=$request->region;
        $po->territory=$request->territory;
        $po->distributor=$request->dname;
        $po->date=date("Y-m-d");
        $po->remark=$request->remark;
        $po->totalPrice=0;

        $qty=$request->qty;
        $avbqty=$qty;
        $po->save();

        $zone=new Zone;
        $data=Zone::all();

        $region=new Region;
        $data1=Region::all();

        $terr=new Territory;
        $data2=Territory::all();

        $user=new NewUser;
        $data3=NewUser::all();

        $product=new Product;
        $data4=Product::all();

        return view('addPOuser')->with('zones',$data)
        ->with('regions',$data1)
        ->with('territories',$data2)
        ->with('new_users', $data3)
        ->with('products', $data4);
    }
}
