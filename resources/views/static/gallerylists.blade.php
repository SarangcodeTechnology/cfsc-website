@extends('myapp.layout')

@section('title',$gallery->title)

@section('body')
    <!-- Breadcrumbs -->
    @include('include.breadcrumps',[
        'title'=>$gallery->title,
        'hasParent'=>1,
        's_title'=>'ग्यालरी',
        's_link'=>'/s/gallery',
    ])
    <!-- End Breadcrumbs -->
    <!-- End Feature section Area -->
    <section class="gallery-block compact-gallery">
        <div class="container">
            <div class="row">

                @foreach (json_decode($gallery->images) as $item)
                <div class="col-md-6 col-lg-3 item zoom-on-hover">
                    <a class="lightbox" href="{{Voyager::image($item)}}">
                        <img class="img-fluid image" src="{{Voyager::image($item)}}">
                    </a>
                </div>
                @endforeach

        </div>
        </div>
    </section>
@endsection
