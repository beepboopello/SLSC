@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-3" style="padding-left: 10%">
            <div class="main-left-sidebar">
                <div class="user_profile">
                    <div class="user-pro-img">
                        <img src="{{ asset('/assets/images/alt.jpeg') }}" alt="">
                    </div>
                    <div class="user_pro_status">
                        <ul class="flw-status" style="padding-left: 0%">
                            <li>
                                <span>Souls</span>
                                <b>{{ $user->souls }}</b>
                            </li>
                            <li>
                                <span>Soul memory</span>
                                <b>{{ $user->soul_memory }}</b>
                            </li>
                        </ul>
                    </div>
                    {{-- <ul class="social_links">
                        <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
                        <li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a>
                        </li>
                        <li><a href="#" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
                        <li><a href="#" title=""><i class="fa fa-google-plus-square"></i>
                                Http://www.googleplus.com/john...</a></li>
                        <li><a href="#" title=""><i class="fa fa-behance-square"></i> Http://www.behance.com/john...</a>
                        </li>
                        <li><a href="#" title=""><i class="fa fa-pinterest"></i> Http://www.pinterest.com/john...</a></li>
                        <li><a href="#" title=""><i class="fa fa-instagram"></i> Http://www.instagram.com/john...</a></li>
                        <li><a href="#" title=""><i class="fa fa-youtube"></i> Http://www.youtube.com/john...</a></li>
                    </ul> --}}
                </div>
                <div class="suggestions full-width">
                    <div class="sd-title">
                        <h3>Thông tin thêm</h3>
                        <i class="la la-ellipsis-v"></i>
                    </div>
                    <div class="suggestions-list">
                        @if ($user->id == 1)
                            <div class="suggestion-usd">
                                <img src="images/resources/s1.png" alt="">
                                <div class="sgt-text">
                                    <h4>Quản trị viên</h4>
                                </div>
                            </div>
                        @endif
                        <div class="suggestion-usd">
                            <img src="images/resources/s1.png" alt="">
                            <div class="sgt-text">
                                <h4>Email</h4>
                                <span>{{ $user->email }}</span>
                            </div>
                        </div>
                        <div class="suggestion-usd">
                            <img src="images/resources/s2.png" alt="">
                            <div class="sgt-text">
                                <h4>Điện thoại</h4>
                                <span>{{ $user->tel }}</span>
                            </div>
                        </div>
                        <div class="suggestion-usd">
                            <img src="images/resources/s2.png" alt="">
                            <div class="sgt-text">
                                <h4>Thời gian tạo</h4>
                                <span>{{ $user->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @if (Auth::user() != null)
                            @if (Auth::user()->id == $user->id)
                                <div class="view-more">
                                    <a href="/edit_profile" title="">Chỉnh sửa</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top: 5%; margin-left:20px">
            <div class="main-ws-sec">
                <div class="user-tab-sec">
                    <h3>{{ $user->name }} ( {{ $user->alias }} ) </h3>
                    <div class="star-descp">
                        @if ($user->description == '')
                            <span>Chúng tôi không biết nhiều về người dùng này, nhưng chắc chắn anh/cô ấy là một người tuyệt
                                vời!</span>
                        @else
                            <span>{{ $user->description }}</span>
                        @endif
                    </div>
                </div>
                <div class="posts-section">
                    @foreach ($posts as $post)
                        <a href="/post/{{ $post->id }}">
                            <div class="post-bar">
                                <div class="post_topbar">
                                    <div class="usy-dt">
                                        <div class="usy-name">
                                            <h3>{{ $user->name }}</h3>
                                            <span><img src="{{ asset('/assets/images/clock.png') }}"
                                                    alt="">{{ $post->updated_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="ed-opts">
                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                        <ul class="ed-options">
                                            <li><a href="#" title="">Edit Post</a></li>
                                            <li><a href="#" title="">Unsaved</a></li>
                                            <li><a href="#" title="">Unbid</a></li>
                                            <li><a href="#" title="">Close</a></li>
                                            <li><a href="#" title="">Hide</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job_descp">
                                    <p style="padding-left: 3%">{{ $post->content }}</p>
                                </div>
                                <div class="job-status-bar">
                                    <ul class="like-com" style="margin-bottom: 0%">
                                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Đánh giá
                                                {{ $post->praises }}</a></li>
                                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Bình luận
                                                0</a></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-2" style="margin-top: 5%;">
            <div class="company_profile_info">
                <div class="company-up-info">
                    <h3>{{ $set->name }}</h3>
                    <img src='{{ asset($set->url) }}' title="{{ $set->description }}">
                </div>
            </div>
        </div>
    </div>
@endsection
