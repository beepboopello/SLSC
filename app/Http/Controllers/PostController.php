<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Interactions;
use App\Models\PostComment;
use App\Http\Controllers\UserController;
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
        UserController::updateSouls(Auth::user()->id,10);
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
            UserController::updateSouls($uid,10);
            if($uid!= $post[0]->fromUser)
                UserController::updateSouls($post[0]->fromUser,100);
            return redirect("/warp/{$post[0]->place}");
        }
        if($status[0]->action == -1){
            DB::update("update interactions set action = 1 where id = {$status[0]->id}");
            DB::update("update posts set praises = praises + 2 where id = {$pid}");
            return redirect("/warp/{$post[0]->place}");
        }
        if($status[0]->action == 1){
            DB::update("update interactions set action = 0 where id = {$status[0]->id}");
            DB::update("update posts set praises = praises -1 where id = {$pid}");
            return redirect("/warp/{$post[0]->place}");
        }
        if($status[0]->action == 0){
            DB::update("update interactions set action = 1 where id = {$status[0]->id}");
            DB::update("update posts set praises = praises +1 where id = {$pid}");
            return redirect("/warp/{$post[0]->place}");
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
            UserController::updateSouls($uid,10);
            if($uid!= $post[0]->fromUser)
                UserController::updateSouls($post[0]->fromUser,100);
            DB::update("update posts set praises = praises - 1 where id = {$pid}");
            return redirect("/warp/{$post[0]->place}");
        }
        if($status[0]->action == 1){
            DB::update("update interactions set action = -1 where id = {$status[0]->id}");
            DB::update("update posts set praises = praises - 2 where id = {$pid}");
            return redirect("/warp/{$post[0]->place}");
        }
        if($status[0]->action == -1){
            DB::update("update interactions set action = 0 where id = {$status[0]->id}");
            DB::update("update posts set praises = praises + 1 where id = {$pid}");
            return redirect("/warp/{$post[0]->place}");
        }
        if($status[0]->action == 0){
            DB::update("update interactions set action = -1 where id = {$status[0]->id}");
            DB::update("update posts set praises = praises -1 where id = {$pid}");
            return redirect("/warp/{$post[0]->place}");
        }
    }
    public function viewOnePost(Request $request, $pid){
        $post = Post::where('id',$pid)->get();
        if(!$post->last()) return view('error_page',['msg'=>"Post doesn't exist!"]);
        return view('post',
        ['post'=>$post[0]],
        ['user'=>User::where('id',$post[0]->fromUser)->get()[0]],
        ['comments'=>PostComment::where('pid',$post[0]->id)->get()]);
    }


}

