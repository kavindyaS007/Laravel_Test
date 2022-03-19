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
        $po->zone=$request->zone;
        $po->region=$request->region;
        $po->territory=$request->territory;
        $po->distributor=$request->dname;
        $po->date=date("Y-m-d");
        $po->remark=$request->remark;
        $po->totalPrice=$request->totalPrice;
        
        $po->save();

        $more = new pomoredetails;

        $more->zone=$request->zcode;

        $zone=new Zone;
        $data=Zone::all();

        $region=new Region;
        $data1=Region::all();

        $terr=new Territory;
        $data2=Territory::all();

        $user=new NewUser;
        $data3=NewUser::all();

        $product=new Product;
        $qty=$request->qty;
        $avbqty = $product->quantity;
        $avbqty = ($avbqty - $qty);
        $skucode=$request->skucode;
        // Page::where('id', $id)->update(array('image' => 'asdasd'));
        Product::where('skucode',$skucode)->update(array('quantity' => $avbqty));
        // $product->quantity=$product->quantity - $qty;
        // $product->save();
        $data4=Product::all();

        return view('addPOuser')->with('zones',$data)
        ->with('regions',$data1)
        ->with('territories',$data2)
        ->with('new_users', $data3)
        ->with('products', $data4);
    }

    public function viewPOuser(Request $request){
        $region=new Region;
        $data1=Region::all();

        $terr=new Territory;
        $data2=Territory::all();

        $po=new podetails;
        $po->region=$request->region;
        $po->territory=$request->territory;
        $po->poNo=$request->poNo;
        $po->territory=$request->territory;
        $data=podetails::all();

        return view('viewPO')->with('regions',$data1)
        ->with('territories',$data2)
        ->with('podetails',$data)
        ->with('poNo',$po->poNo);
    }
    
}
