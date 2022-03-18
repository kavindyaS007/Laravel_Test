<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Region;
use App\Models\Territory;
use App\Models\NewUser;

use Validator;
use Auth;

class DataController extends Controller
{

    //login form vallidation
    public function checklogin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:3'
        ]);

        $userdata = array(
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        );
        if(Auth::attempt($userdata)){
            // if($userdata->username == 'Admin001'){
            //     return redirect('/admin');
            // }
           return redirect('/admin');
        }
        else{
            return back()->with('error','Wrong login details');
        }
    }

   //data storing to tables:zone, region, territory

    public function storeZone(Request $request){
        $zone=new Zone;
       
        $this->validate($request,[
            'zLdescription'=>'required|max:100',
            'zSdescription'=>'required|max:5|min:1',
        ]);

        $zone->zlongdes=$request->zLdescription;
        $zone->zshortdes=$request->zSdescription;
        $zone->save();

        $data=Zone::all();
        return view('zoneReg')->with('zones',$data);
        //return redirect()->back();
    }

    public function storeRegion(Request $request){
        $region=new Region;

        $this->validate($request,[
            'zone'=>'required',
            'rname'=>'required|max:20',
        ]);

        $region->zone=$request->zone;
        $region->rname=$request->rname;
        $region->save();

        $zone=new Zone;
        $data=Zone::all();
        return view('regionReg')->with('zones',$data);
    }

    public function storeTerritories(Request $request){
        $terr=new Territory;

        $this->validate($request,[
            'zone'=>'required',
            'region'=>'required',
            'tname'=>'required|max:20',
        ]);

        $terr->zone=$request->zone;
        $terr->region=$request->region;
        $terr->tname=$request->tname;
        $terr->save();

        $terr=new Zone;
        $data=Zone::all();
        
        $terr=new Region;
        $data1=Region::all();
        return view('territoryReg')->with('zones',$data)->with('regions',$data1);
    }
}