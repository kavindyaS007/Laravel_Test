<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Zone;
use App\Models\Region;
use App\Models\Territory;
use App\Models\NewUser;
use App\Models\Product;

class PagesController extends Controller
{
    public function Login(){
        return view('login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function homeAdmin(){
        return view('admin');
    }
    public function homeUser(){
        echo "user home page";
    }

//admin activities    
    public function zoneReg(){
        $zone=new Zone;
        $data=Zone::all();
        return view('zoneReg')->with('zones',$data);
    }
    public function regionReg(){
        $zone=new Zone;
        $data=Zone::all();
        return view('regionReg')->with('zones',$data);
    }
    public function territoryReg(){
        $zone=new Zone;
        $data=Zone::all();

        $region=new Region;
        $data1=Region::all();
        return view('territoryReg')->with('zones',$data)->with('regions',$data1);
    }

    public function userReg(){
        $user=new Territory;
        $data=Territory::all();
        return view('userReg')->with('territories',$data);
    }
    public function productReg(){
        return view('productReg');
    }

    public function viewPOadmin(){
        return view('viewPO');
    }
    public function addStock(){
        // return view('viewPO');
        echo "increase quantity";
    }


//user activities
    public function addPOuser(){
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

    public function viewPOuser(){
        return view('viewPO');
    }
    
}
