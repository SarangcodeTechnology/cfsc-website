{{-- copy below to create new static page --}}

@extends('myapp.layout')

@section('title','Write Title Here')

@section('body')
    <div class="breadcrumbs overlay" style="background: url('https://unsplash.com/photos/Bkci_8qcdvQ/download?force=true&w=640')">
        <div class="container">
        <div class="bread-inner">
            <div class="row">
            <div class="col-12">
                <h2>परिचय</h2>
                <ul class="bread-list">
                <li><a href="/">गृहपृष्ठ</a></li>
                <li><i class="icofont-simple-right"></i></li>
                <li><a href="/">हाम्रो बारेमा</a></li>
                <li><i class="icofont-simple-right"></i></li>
                <li class="active">भिजन / मिसन / उद्देश्य</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="inner-content-wrapper blog-sec blog-area">
        <div class="container">
            <div class="inner-content-wrapper faq-wrapper">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="faq-wrapper mb-30">
                            <div class="section-title mb-30">
                                <h5> FAQs <span class="border-right-1"></span></h5>
                                <h2>Frequently Asked Questions</h2>
                            </div>
                            <div class="faq-box">
                                <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                    <h5 class="mb-0"> <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Do you have a stay in maid?</a> </h5>
                                    </div>
                                    <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0"> <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Do you operate a 24 hour service?</a> </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                    <h5 class="mb-0"> <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Do you have a nanny service?</a></h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                    <h5 class="mb-0"> <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What is your range in customers?</a></h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio</p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection