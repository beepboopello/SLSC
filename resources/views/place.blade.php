@extends('layouts.app')
@section('content')
{{-- @php
dd($place->bg);
@endphp --}}
    <section class="forum-page" style="height: 100%;width:100%;position: absolute;overflow:scroll;
                background-image: url('{{ asset($place->bg) }}');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size : 100% 100%">
        @php
            if (Auth::check()) {
                $currentUser = Auth::user()->id;
            } else {
                $currentUser = -1;
            }
        @endphp

        @if ($currentUser != -1)
            <button class="ask-question" style="position: fixed;margin-left: 15%;height:50px;width:10%;">Đăng bài viết tại đây</button>
            <div class="overview-box" id="question-box">
                <div class="overview-edit">
                    <h3>Bạn viết gì đi</h3>
                    <form method="POST" action="{{ route('savePost') }}">
                        {{ csrf_field() }}
                        <textarea placeholder="Content" name='content'></textarea>
                        <input type="hidden" name="place" id="place" value="{{$place->endpoint}}">
                        <input type="hidden" name="fromHere" id="fromHere" value="/warp/{{$place->endpoint}}">
                        <button type="submit" class="save">Đăng</button>
                    </form>

                    <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
                </div>
            </div>
        @endif
        <div style="margin-left: 10%; margin-right :10%;height:100%;">
            <section class="forum-page">
                <div class="container">
                    <div class="forum-questions-sec" style="background-color: #fff">
                        <div class="row">
                            <div class="col-lg-8">
                                @foreach ($posts as $post)
                                    <div class="usr-question" style="border: 5px #686868">
                                        <div class="usr_img">
                                            <img src="{{ asset('/assets/images/alt.jpeg') }}">
                                        </div>
                                        <div class="usr_quest">
                                            @php
                                                $user = App\Models\User::where('id', $post->fromUser)->get();
                                            @endphp
                                            <a href="/user/{{$user[0]->id}}" style="color: #000; text-decoration: none;"><h2>{{ $user[0]->name }}</h2></a> {{-- Inline css might be changed later --}}
                                            <h3>{{ $post->content }}</h3>
                                            <ul class="react-links">
                                                <li><a href="#" title="">Vote : {{ $post->praises }}</a>
                                                </li>
                                                <li><a href="#" title="">Comments : 0</a>
                                                </li>
                                            </ul>
                                            <ul class="quest-tags">
                                                <li>
                                                    <form action='/api/praisePost/{{ $currentUser }}/{{ $post->id }}'
                                                        method='POST'><button class="btn-submit-form">Praise</button></form>
                                                </li>
                                                <li>
                                                    <form action='/api/rejectPost/{{ $currentUser }}/{{ $post->id }}'
                                                        method='POST'><button class="btn-submit-form">Reject</button></form>
                                                </li>
                                                <li><a href='/post/{{$post->id}}' title="">Detail</a></li>
                                            </ul>
                                        </div>
                                        <span class="quest-posted-time"><i class="fa fa-clock-o"></i> {{$post->updated_at->diffForHumans()}} </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </div>
    </section>
@endsection
