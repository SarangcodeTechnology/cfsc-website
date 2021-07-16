@extends('myapp.layout')

@section('title','ग्यालरी')

@section('body')

    @include('include.breadcrumps',[
        'title'=>'ग्यालरी',
        'hasParent'=>0,
    ])
    <!-- End Feature section Area -->
    <section class="inner-content-wrapper blog-sec">
        <div class="container">
            <div class="row">

                @foreach (\App\Gallery::orderBy('order')->get() as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                     <div class="blog-img"> <a href="?galleryid={{$item->id}}"><img src="{{Voyager::image($item->cover)}}" alt=""></a>
                       <div class="blog-date"> <span>भदौ ४, २०७६</span> </div>
                     </div>
                     <div class="blog-text p-0 px-1 py-2">
                       <p class="m-0"><a href="?galleryid=1">{{$item->title}}</a></p>
                     </div>
                   </div>
                 </div>
                @endforeach

        </div>
        </div>
    </section>
@endsection
