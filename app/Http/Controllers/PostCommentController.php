<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\Post;
use App\Http\Controllers\UserController;
use Auth;
use DB;

class PostCommentController extends Controller
{
    public function createComment(Request $request){
        $newComment = new PostComment;
        $post = Post::where('id',$request->pid)->get();
        if($request->content.trim(" ")==""||$request->uid==-1){
            return null;
        }
        $newComment->content = $request->content;
        $newComment->uid = $request->uid;
        $newComment->pid = $request->pid;
        $newComment->save();
        $uid = $request->uid;
        UserController::updateSouls($uid,10);
        if($uid!= $post[0]->fromUser)
            UserController::updateSouls($post[0]->fromUser,100);
        return redirect("/post/{$request->pid}");
    }

}
