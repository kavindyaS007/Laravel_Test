<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Region;
use App\Models\Territory;
use App\Models\NewUser;
use App\Models\Product;

//use App\Helpers\Helper;

use Validator;
use Auth;

class UserDataController extends Controller
{
    public function storeUsers(Request $request){
        $user=new NewUser;

        $this->validate($request,[
            'name'=>'required|max:50|min:1',
            'nic'=>'required|max:12|min:10',
            'address'=>'required|max:50|min:1',
            'mob'=>'required|max:12|min:10',
            'email'=>'required|email',
            'gender'=>'required',
            'territory'=>'required',
            'uname'=>'required|max:10|min:5',
            'pwd'=>'required|min:5',
        ]);

        $user->name=$request->name;
        $user->nic=$request->nic;
        $user->address=$request->address;
        $user->mobile=$request->mob;
        $user->email=$request->email;
        $user->gender=$request->gender;
        $user->territory=$request->territory;
        $user->username=$request->uname;
        $user->password=$request->pwd;
        $user->save();

        $user=new Territory;
        $data=Territory::all();
        return view('userReg')->with('territories',$data);
    }

    public function storeProduct(Request $request){
        $product = new Product;

        $product->skucode=$request->skucode;
        $product->mpname=$request->mpname;
        $product->mrp=$request->mrp;
        $product->distPrice=$request->distPrice;
        $product->weight=$request->weight;
        $product->unit=$request->unit;
        $product->quantity=$request->quantity;

        $product->save();

        return view('productReg');
    }

    public function addPO(Request $request){
        $zone=new Zone;
        $data=Zone::all();

        $region=new Region;
        $data1=Region::all();

        $terr=new Territory;
        $data2=Territory::all();

        $user=new NewUser;
        $data3=NewUser::all();

        return view('territoryReg')->with('zones', $data)
        ->with('regions', $data1)
        ->with('territories', $data2)
        ->with('new_users', $data3);
    }
}
