@extends('static.masterpage-404')

@section('styles')

@endsection

@section('content')

    <div class="off-canvas-wrapper" style="border:10px solid red;">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

            <div class="off-canvas-content" data-off-canvas-content>

                <section class="error-page">
                    <div class="row secBg">
                        <div class="large-8 large-centered columns">
                            <div class="error-page-content text-center" style="padding:0 !important">
                                <div class="error-img text-center">
                                    <img src="{{asset('images/404-error.png')}}" alt="404 page">
                                    <div class="spark">
                                        <img class="flash" src="{{asset('images/spark.png')}}" alt="spark">
                                    </div>
                                </div>
                                <h1>Page Not Found</h1>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                <a href="{{route('user.dashboard')}}" class="button">Go Back Home Page</a>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <!--end off canvas content-->
        </div><!--end off canvas wrapper inner-->
    </div><!--end off canvas wrapper-->
    <!-- script files -->

@endsection

@section('scripts')

@endsection