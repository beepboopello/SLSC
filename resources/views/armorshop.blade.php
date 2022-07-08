@extends('layouts.app')
@section('content')
    
    <section class="forum-page">
        <div class="container">
            <div class="company-title">
                <h3>All sets</h3>
            </div>
            
            <div class="companies-list">
                <div class="row">
                    @foreach($sets as $set)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <img src='{{asset($set->url)}}' title="{{$set->description}}">
                                <h3>{{$set->name}}</h3>
                                <h4>{{$set->price}} soul(s)</h4>
                            </div>
                            @php
                            $owned = 0;
                            foreach($accesses as $access)
                                if($access->aid == $set->id){
                                $owned = 1;
                                echo '<a href="" title="" class="view-more-pro">Owned</a>';
                                }
                            @endphp
                            @if($owned == 0)
                                <a href="/shop/{{$set->id}}"class="view-more-pro">Get this set</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </section>
@endsection
