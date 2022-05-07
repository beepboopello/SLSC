@extends('layouts.app')
@section('content')
@php
    if(Auth::check()) $currentUser = Auth::user()->id;
    else $currentUser = -1;
@endphp
@if ($currentUser!=-1)
<div style="margin-left: 10%">
    <h1> Create your post : </h1>
        <form method="POST" action="{{route('savePost')}}">
            {{ csrf_field() }}
            <input type="text" size='50' name='content'>
            <input type="hidden" name="place" id="place" value="firelink">
            <input type="hidden" name="fromHere" id="fromHere" value = "/warp/firelink">
            <button type="submit">Post</button>
        </form>
</div>
@endif
<div style="margin-left: 10%; margin-right :10%">
    <h1> Recent posts </h1><br>
    <div style="display: block; margin-left :10%;">
    @php
           foreach ($posts as $post) {
                echo "<div style='background-color : #fff'>";
                $user = App\Models\User::where('id',$post->fromUser)->get();
                echo "<span>{$user[0]->name} : </span>";
                echo "<span style='font-size: 200%; display : inline-block'> {$post->content} | Rating : {$post->praises} </span><br>";
                echo "
                <div>
                    <form action='/api/praisePost/{$currentUser}/{$post->id}' method='POST'>
                        <button type='submit'>Praise</button>
                    </form>
                    <form action='/api/rejectPost/{$currentUser}/{$post->id}' method='POST'>
                        <button type='submit'>Reject</button>
                    </form>
                </div>
                </div><br>";
               
           }
    @endphp
    </div>
</div>
@endsection