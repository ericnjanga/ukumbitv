@extends('r.layouts.simple')
@section('content')
    <div class="about-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-7 col-lg-6 col-xl-5">
                    <div class="title-page">About us</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="content-block">
                        <div class="img-block">
                            <img src="{{asset('r/img/landing-bg.png')}}" alt="">
                        </div>
                        <p class="content-text">Scarlett Johansson stars in the visually stunning Ghost in the Shell, an action-packed adventure set in a future world where people are enhanced with technology. Believing she was rescued from near death, Major (Johansson) becomes the first of her kind: a human mind inside an artificial body designed to fight the war against cyber-crime. While investigating a dangerous criminal, Major makes a shocking discovery – the corporation that created her lied about her past life in order to control her. Unsure what to believe, Major will stop at nothing to unravel the mystery of her true identity and exact revenge against the corporation she was built to serve.</p>
                        <div class="content-block-bottom">
                            <div class="title-page-add">Questions ?</div>
                            <div class="text-add">Fill free to contact us</div>
                            <a href="{{route('user.contact')}}" class="butn btn-cta1b butn-large">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection