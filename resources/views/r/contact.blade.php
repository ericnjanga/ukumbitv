@extends('r.layouts.simple')
@section('content')
    <div class="contact-wrap">
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        <div class="contact-block">
                            <div class="title-page">Contact us</div>
                            <div class="text-add"><p>Fill free to ask questions</p> We will do our best respond or contact you back within the next 24 hours</div>
                            <div class="contact-info">
                                <div class="mail"><span class="icon icon-envelope"></span>info@gmail.com</div>
                                <div class="phone"><span class="icon icon-phone-receiver"></span>+1 647-704-7219</div>
                            </div>
                            <div class="soc-block">
                                <div class="list-title">We are in social</div>
                                <ul class="social-list">
                                    <li><a href="https://www.facebook.com/ukumbitv/" target="_blank" class="icon icon-facebook"></a></li>
                                    <li><a href="https://twitter.com/ukumbi_tv" target="_blank" class="icon icon-twitter"></a></li>
                                    <li><a href="https://www.instagram.com/ukumbitv" target="_blank" class="icon icon-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-7">
                        <div class="contact-form">
                            <div class="title-form">Enter your message</div>
                            <form action="" method="">
                                <div class="input-wrap textarea-wrap">
                                    <textarea name="" id=""></textarea>
                                </div>
                                <div class="input-block">
                                    <div class="input-wrap select-wrap">
                                        <select name="">
                                            <option selected>Select the appeal category</option>
                                            <option>appeal 1</option>
                                            <option>appeal 2</option>
                                            <option>appeal 3</option>
                                            <option>appeal 4</option>
                                            <option>appeal 5</option>
                                        </select>
                                    </div>
                                    <div class="input-wrap">
                                        <label>Enter your e-mail <span>*</span></label>
                                        <input type="email" name="email" required>
                                    </div>
                                    <button type="submit" class="butn btn-cta1b btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection