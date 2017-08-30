@extends('r.layouts.user-search')
@section('content')
    <div class="myaccount-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-md-3 col-lg-3 col-xl-2 acc-menu">
                    @include('r.chunks._account_menu')
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2 col-xl-2 offset-lg-2 offset-xl-1">
                    <div class="img-block">
                    <img src="{{asset('r/img/user-photo.png')}}" alt="">
                        <a href="" class="change-photo-butn"><span class="icon icon-pencil-edit-button"></span></a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
                    <div class="account-form-block">
                        <form action="" method="">
                            <div class="input-wrap">
                                <label>Full name</label>
                                <input type="text" name="name">
                            </div>
                            <div class="input-wrap">
                                <label>E-mail</label>
                                <input type="email" name="email">
                            </div>
                            <div class="input-wrap input-tel">
                                <label>Phone</label>
                                <input type="tel" name="usrtel">
                            </div>
                            <div id="change-pas" class="change-pas like-link">Change password</div>

                            <button type="submit" class="butn btn-cta1b butn-large">Save Changes</button>
                        </form>
                        <div class="change-pas-block">
                            <form action="" method="">
                                <div class="input-wrap">
                                    <label>Enter current password</label>
                                    <input type="password" name="old_password" class="mypass">
                                </div>
                                <div class="input-wrap">
                                    <label>Enter new password</label>
                                    <input  type="password" name="new_password" class="mypass">
                                </div>
                                {{--<div class="operations-pass">--}}
                                    {{--<span id="show-pas" class="like-link">Show password</span>--}}
                                {{--</div>--}}
                                <button type="submit" class="butn btn-cta1 butn-large">Save new password</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection