@extends('layouts.app')
@section('content')
    <div style="margin-left: 10%">
        <form method="POST" action="edit_profile">
            {{ csrf_field() }}
            <h2 style ="margin-left: 10%">Edit your profile :</h2> <br>
            <span><label style = "display:inline-block;width:200px;margin-right:30px;text-align:right;">Your name :</label> <input type="text" name="name" required></span><br>
            <span><label style = "display:inline-block;width:200px;margin-right:30px;text-align:right;">Your alias :</label> <input type="text" name="alias"></span><br>
            <span><label style = "display:inline-block;width:200px;margin-right:30px;text-align:right;">Describe yourself :</label> <input type="text" name="description"></span><br>
            <button style="margin-left: 15% ; margin-top: 20px" type = "subtmit">Confirm edit</button>
        </form> 
    </div>
@endsection