@extends('r.layouts.simple')
@section('content')

    <div class="jobs-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="title-page">Jobs</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="jobs-block">

                        <div class="jobs-list">
                            <div class="jods-item">
                                <div class="jods-title">Director Business Development - MEA</div>
                                <p class="jods-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                                <a href="{{route('user.jobs',0)}}" class="butn butn-orange-white">More Details</a>
                            </div>
                            <div class="jods-item">
                                <div class="jods-title">Director Business Development - MEA</div>
                                <p class="jods-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                                <a href="{{route('user.jobs',0)}}" class="butn butn-orange-white">More Details</a>
                            </div>
                            <div class="jods-item">
                                <div class="jods-title">Director Business Development - MEA</div>
                                <p class="jods-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                                <a href="{{route('user.jobs',0)}}" class="butn butn-orange-white">More Details</a>
                            </div>
                        </div>
                        <div class="content-block-bottom">
                            <div class="title-page-add">Interesting positions ?</div>
                            <div class="text-add">Fill free to contact us</div>
                            <a href="{{route('user.contact')}}" class="butn butn-orange butn-large">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection