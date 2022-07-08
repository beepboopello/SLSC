<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Access;
use App\Models\ArmorSet;
use Illuminate\Http\Request;
use Auth;
use DB;

class AccessController extends Controller
{
    public function armorShopDisplay(Request $Request){
        $sets = ArmorSet::all();
        if(Auth::user()==null) $access=null;
        elseif(!Access::where('uid',Auth::user()->id)->get()->last()){
            Access::create([
                'uid'=>Auth::user()->id,
                'aid'=> 1]);
            $access = Access::where('uid',Auth::user()->id)->get();
        }
        else $access = Access::where('uid',Auth::user()->id)->get();

        return view('armorshop',['sets'=>$sets],['accesses'=>$access]);
    }
    public function getSet(Request $Request,$id){
        if (Auth::user()==null) armorShopDisplay();
        $user = Auth::user();
        $set = ArmorSet::where('id',$id)->get();
        if(!$set->last()) abort(404);
        if($user->souls < $set[0]->price) return redirect('/shop');
        UserController::updateSouls($user->id,-$set[0]->price);
        Access::create([
            'uid'=>$user->id,
            'aid'=>$id
        ]);
        return redirect('/shop');
    }
}
