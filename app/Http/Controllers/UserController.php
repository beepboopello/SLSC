<?php

namespace App\Http\Controllers;
use App\Models\Interactions;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Access;
use App\Models\ArmorSet;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function User_profile(Request $request, $id){
        $user = User::where('id',$id)->get();
        $posts = Post::where('fromUser',$id)->get()->reverse();
        if(!$user->last()) return view('error_page',['msg'=>"User doesn't exist!"]);
        $set = ArmorSet::where('id',$user[0]->currentSet)->get();
        return view('profile')
            ->with('user',$user[0])
            ->with('posts',$posts)
            ->with('set',$set[0]);
    }

    public function getEditForm(Request $request){
        $user = Auth::user();
        if($user==null) return view('home');
        $accesses = Access::where('uid',$user->id)->get();
        $sets = array();
        foreach($accesses as $access){
            $sets[] = ArmorSet::where('id',$access->id)->get()[0];
        }
        return view('editProfile')
            ->with('user',$user)
            ->with('sets',$sets);
    }
    public function editProfile(Request $request){
        $user = User::where('id',Auth::user()->id)->get()[0];
        $user->name = $request->name;
        if (!$request->alias) $user->alias = '';
        else $user->alias = $request->alias;
        if (!$request->description) $user->description = '';
        else $user->description = $request->description;
        $user->currentSet = $request->currentSet;
        $user->save();
        return redirect("/user/{$user->id}");
    }
    public function changePassword(Request $request){
        $user = Auth::user();
        if(!Hash::check($request->oldPassword, $user->password)||$request->newPassword != $request->repeatPassword)
        return redirect('/edit_profile');
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return redirect("/user/{$user->id}");
    }
    public function updateSouls($id,$souls){
        if($souls>0) DB::update("update users set soul_memory = soul_memory + {$souls} where id={$id}");
        DB::update("update users set souls = souls+ {$souls} where id={$id}");
    }
    public function searchUser($request){
        $user = User::where('name','like','%'.$request->search.'%')->get();
        dd($user);
    }
}
