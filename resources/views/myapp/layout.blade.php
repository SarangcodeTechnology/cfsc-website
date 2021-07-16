<!doctype html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>@yield('title')</title>

@include('include.head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
</head>

<body>
    @if(!Request::segment(1))
    <!-- Pre Loader -->
    <div id="dvLoading"></div>
    <!-- Header Area -->
    @endif
@include('include.header')


    <div id="app">
        @yield('body')
    </div>


<!-- footer -->
@include('include.footer')


@include('include.script')

@yield('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
 baguetteBox.run('.compact-gallery', {
     animation: 'slideIn',
 });
</script>
</body>
<div id="fb-root"></div>
<script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/oqtdXEs9TE9ZUAIhXNz5JBt_/recaptcha__en.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=482891975748553&autoLogAppEvents=1" nonce="lWLCFaDT"></script>
</html>
