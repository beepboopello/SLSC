@extends('layouts.app')
@section('content')
<div style="margin-left: 10%">
    @php   
        echo "Development inprogress...";
        echo "<h3>This user's id : {$user->id}  </h3><br>";
        echo "<h3>This user's email : {$user->email}  </h3><br>";
        echo "<h3>This user's name : {$user->name}  </h3><br>";
        echo "<h3>This user's description : {$user->description}  </h3><br>";
        echo "<h3>This user's alias : {$user->alias}  </h3><br>";
    @endphp
    <form action="{{url('edit_profile')}}" method="GET">
        {{ csrf_field() }}
    @php
    if (Auth::user()->id == $user->id) {
        echo "<button type='submit'>Edit your profile</button>";
    }
    @endphp
    </form>
@endsection