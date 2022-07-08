<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Post;

class PlaceController extends Controller
{
    public function directTo(Request $request,$place){
        // return view($place,['posts'=> Post::where('place','firelink')->get()->reverse()]);
        $page = Place::where('endpoint',$place)->get();
        if(!$page->last()) abort(404);
        return view('place',['posts'=> Post::where('place',"{$page[0]->endpoint}")->get()->reverse()],['place'=>$page[0]]);
    }

    public function Places_Init(){
        Place::create([
            'name' => 'Điện thờ Firelink',
            'endpoint' => 'firelink',
            'description' => 'none',
            'icon' => "/assets/images/firelink_icon.gif",
            'bg' => "/assets/images/firelink_bg.gif",
        ]);
        Place::create([
            'name' => 'Lâu đài Lothric',
            'endpoint' => 'lothric',
            'description' => 'none',
            'icon' => "/assets/images/lothric_icon.gif",
            'bg' => "/assets/images/lothric_bg.webp",
        ]);
        Place::create([
            'name' => 'Thủ đô Irithyll của thung lũng Boreal',
            'endpoint' => 'irithyll',
            'description' => 'none',
            'icon' => "/assets/images/irithyll_icon.gif",
            'bg' => "/assets/images/irithyll_bg.jpg",
        ]);
    }

}
