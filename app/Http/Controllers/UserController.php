<?php

namespace App\Http\Controllers;
use App\Models\Interactions;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    public function User_profile(Request $request, $id){
        $user = User::where('id',$id)->get();
        if(!$user->last()) return view('error_page',['msg'=>"User doesn't exist!"]);
        return view('profile', ['user'=>$user[0]]);
    }

    public function getEditForm(Request $request){
        return view('editProfile');
    }
    public function editProfile(Request $request){
        $user = User::where('id',Auth::user()->id)->get()[0];
        $user->name = $request->name;
        if (!$request->alias) $user->alias = '';
        else $user->alias = $request->alias;
        if (!$request->description) $user->description = '';
        else $user->description = $request->description;
        $user->save();
        return view('profile',['user'=>$user]);
    }
}
