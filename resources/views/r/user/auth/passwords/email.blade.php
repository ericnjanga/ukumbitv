@extends('r.layouts.simple')
@section('content')
    <div class="resetpas-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="title-page">Reset password</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="notice-block">
                        <div class="text-add">We will send new password on your e-mail</div>
                        <form  action="" method="">
                            <div class="input-wrap">
                                <label>E-mail <span>*</span></label>
                                <input type="email" name="email" required>
                            </div>
                            <button type="submit" class="butn btn-cta1b butn-large">Reset password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection