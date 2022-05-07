<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Interactions;
use DB;
use Auth;


class PostController extends Controller
{

    public function savePost(Request $request){ //Add a post
        $newPost = new Post;

        if ($request->content.trim(" ")=="")
            return redirect($request->fromHere);

        $newPost->content = $request->content;
        $newPost->fromUser= Auth::user()->id;
        $newPost->praises = 0;
        $newPost->place = $request->place;
        $newPost->save();
        return redirect($request->fromHere);
    }
    public function praisePost(Request $request, $uid, $pid){
        $user = User::where('id',$uid)->get();
        $post = Post::where('id',$pid)->get();
        $status = Interactions::where('uid',$uid)->where('pid',$pid)->get();
        if(!$user->last() or !$post->last()) return null;
        if(!$status->last()) {
            $newInteraction = new Interactions;
            $newInteraction->uid = $uid;
            $newInteraction->pid = $pid;
            $newInteraction->action = 1;
            $newInteraction->save();
            DB::update("update posts set praises = praises + 1 where id = {$pid}");
            return null;
        }
        if($status[0]->action == -1){
            DB::update("update interactions set action = 1 where id = {$status[0]->id}");
            DB::update("update posts set praises = praises + 2 where id = {$pid}");
        }
        if($status[0]->action == 1){
            DB::delete("delete from interactions where id = {$status[0]->id}");
            DB::update("update posts set praises = praises -1 where id = {$pid}");
        }
    }
    public function rejectPost(Request $request, $uid, $pid){
        $user = User::where('id',$uid)->get();
        $post = Post::where('id',$pid)->get();
        $status = Interactions::where('uid',$uid)->where('pid',$pid)->get();
        if(!$user->last() or !$post->last()) return null;
        if(!$status->last()) {
            $newInteraction = new Interactions;
            $newInteraction->uid = $uid;
            $newInteraction->pid = $pid;
            $newInteraction->action = 1;
            $newInteraction->save();
            DB::update("update posts set praises = praises - 1 where id = {$pid}");
            return null;
        }
        if($status[0]->action == 1){
            DB::update("update interactions set action = -1 where id = {$status[0]->id}");
            DB::update("update posts set praises = praises - 2 where id = {$pid}");
        }
        if($status[0]->action == -1){
            DB::delete("delete from interactions where id = {$status[0]->id}");
            DB::update("update posts set praises = praises + 1 where id = {$pid}");
        }
    }

    public function directToFirelink(Request $request){
        return view('firelink',['posts'=> Post::where('place','firelink')->get()->reverse()]);
    }
}

