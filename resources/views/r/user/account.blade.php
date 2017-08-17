@extends('r.layouts.user-search')
@section('content')
    <div class="myaccount-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    @include('r.chunks._account_menu')
                </div>
                <div class="col-sm-2 offset-sm-1">
                    <div class="img-block">
                    <img src="{{asset('r/img/user-photo.png')}}" alt="">
                        <a href="" class="change-photo-butn"><span class="icon icon-pencil-edit-button"></span></a>
                    </div>
                </div>
                <div class="col-sm-3">
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
                            <a href="" class="change-pas">Change password</a>
                            <button type="submit" class="butn butn-orange butn-large">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection