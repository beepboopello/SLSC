@extends('layouts.app')
@section('content')
    @php
    if (Auth::check()) {
        $currentUser = Auth::user()->id;
    } else {
        $currentUser = -1;
    }
    @endphp
    <section class="forum-page">
        <div class="container">
            <div class="forum-questions-sec" style="background-color: #fff">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="forum-post-view">
                            <div class="usr-question">
                                <div class="usr_img">
                                    <img src={{ asset('/assets/images/alt.jpeg') }}
                                        alt="">
                                </div>
                                <div class="usr_quest">
                                    <h3>{{ $user->name }}</h3>
                                    <span><i class="fa fa-clock-o"></i> timestamp goes here</span>
                                    <ul class="react-links" style="padding-left: 0; ">
                                        <li style="padding-top: 10px"><a href="#" title=""><i class="fa fa-heart"></i> Vote :
                                                {{ $post->praises }}</a></li>
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
                                    </ul>
                                    <p style="font-size: 2.5em">{{ $post->content }}</p>
                                    @php
                                        $comments = App\Models\PostComment::where('pid', $post->id)
                                            ->get()
                                            ->reverse();
                                    @endphp
                                    <div class="comment-section">
                                        <h4>{{sizeof($comments)}} comment(s)</h4>
                                        <div class="comment-sec">
                                            <ul>
                                                @foreach ($comments as $comment)
                                                    <li>
                                                        <div class="comment-list">
                                                            <div class="bg-img">
                                                                <img style="max-height: 50px"
                                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuvMvUuLNnBs8LBoVwguF1DwdFEB4S8sZiCg&usqp=CAU"
                                                                    alt="">
                                                            </div>
                                                            <div class="comment">
                                                                @php
                                                                    $cname = App\Models\User::where('id',$comment->uid)->get()[0]->name;
                                                                @endphp
                                                                <h3>{{$cname}}</h3>
                                                                <span><img src="images/clock.png" alt=""> some minutes
                                                                    ago</span>
                                                                <p>{{ $comment->content }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-comment-box">
                            <div class="user-poster">
                                <div class="usr-post-img">
                                    <img src="images/resources/bg-img2.png" alt="">
                                </div>
                                <div class="post_comment_sec">
                                    <form action="/api/comment" method="POST">
                                        {{ csrf_field() }}
                                        <textarea name="content" placeholder="Your comment goes here"></textarea>
                                        <input type="hidden" name="pid" value="{{ $post->id }}">
                                        <input type="hidden" name="uid" value="{{ $currentUser }}">
                                        <button type="submit">Post comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-adver">
                        <img src="images/resources/adver-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
