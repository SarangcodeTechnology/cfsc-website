@extends('myapp.layout')

@section('title','सुझाव / गुनासो / उजुरी ')

@section('body')
<!-- Breadcrumbs -->

@include('include.breadcrumps',[
'title'=>'सुझाव / गुनासो / उजुरी',
'hasParent'=>0,
])

<!-- End Breadcrumbs -->
<div class="inner-content-wrapper contact-section">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
           
        <div class="default-form-area">
             <p class="text-secondary primary text-left font-weight-normal">तपाईंले निम्न फारम मार्फत आफ्ना सुझाव,गुनासो तथा उजुरी यस डिभिजन वन कार्यालयलाई पठाउन सक्नुहुन्छ। सो
                तरिका ले पठायिएको कुनै पनि सन्देशले तपाईंको ब्यक्तिगत जानकारी सम्प्रेशन गरेर राख्ने छैन। तपाईंको
                सुझाव,गुनासो तथा उजुरीहरुलाई यस डिभिजन वन कार्यालयले गम्भिर्ताका साथ हेर्नेछ।</p>
            <form action="/complain" id="contact-form" method="POST">
                @csrf


                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <div class="input-group">
                            <textarea name="form_message"
                                class="form-control @error('form_message') is-invalid @enderror textarea required"
                                placeholder="सुझाव / गुनासो / उजुरी गर्नहोस्">{{ old('form_message') }}</textarea>
                            @error('form_message')
                            <div class="invalid-feedback">
                                {{ $errors->first('form_message') }}
                            </div>
                            @enderror

                        </div>
                    </div>
                </div>


                @if(env('CAPTCHA_KEY'))
                <div class="row clearfix mt-2">
                    <div class="col-md-12 column">
                        <div class="input-group d-flex justify-content-center">
                            <div class="g-recaptcha  is-invalid" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                            </div>
                            @error('g-recaptcha-response')
                            <div class="invalid-feedback">
                                {{ $errors->first('g-recaptcha-response') }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                @endif
                <div class="contact-section-btn mt-2">
                    <div class="form-group style-two">
                        <button class="bttn" type="submit" data-loading-text="Please wait...">पठाउनुहोस्</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End form -->
    </div>
</div>
@endsection