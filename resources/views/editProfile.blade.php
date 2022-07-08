@extends('layouts.app')
@section('content')
    <section class="profile-account-setting">
        <div class="container">
            <div class="account-tabs-setting">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="acc-leftbar">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab"
                                    aria-controls="nav-acc" aria-selected="false"><i class="la la-cogs"></i>Thông tin cá
                                    nhân</a>
                                <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password"
                                    role="tab" aria-controls="nav-password" aria-selected="false"><i
                                        class="fa fa-lock"></i>Đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                                <div class="acc-setting">
                                    <h3>Chỉnh sửa thông tin cá nhân</h3>
                                    <form method="POST" action="/edit_profile">
                                        {{ csrf_field() }}
                                        <div class="cp-field">
                                            <h5>Tên hiển thị</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Biệt danh</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="alias" value="{{ $user->alias }}"
                                                    placeholder="Biệt danh có thể để trống">
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Giới thiệu</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="description" value="{{ $user->description }}"
                                                    placeholder="Giới thiệu bản thân có thể để trống">
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Nhân vật đại diện</h5>
                                            <div class="cpp-fiel">
                                                <select name="currentSet"
                                                    style="height: 40px; width : 100%; text-indent: 25px">
                                                    @foreach ($sets as $set)
                                                        <option value="{{ $set->id }}">{{ $set->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="save-stngs pd2">
                                            <ul>
                                                <li><button type="submit">Save Setting</button></li>
                                                <li><button type="button">Abort</button></li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-password" role="tabpanel"
                                aria-labelledby="nav-password-tab">
                                <div class="acc-setting">
                                    <h3>Thay đổi mật khẩu </h3>
                                    <form method="POST" action="/password">
                                        {{ csrf_field() }}
                                        <div class="cp-field">
                                            <h5>Mật khẩu cũ</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="oldPassword" placeholder="Mật khẩu cũ">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Mật khẩu mới</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="newPassword" placeholder="Mật khẩu mới">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Xác nhận mật khâu</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="repeatPassword" placeholder="Xác nhận mật khâu">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="save-stngs pd2">
                                            <ul>
                                                <li><button type="submit">Save Setting</button></li>
                                                <li><button type="">Abort</button></li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
