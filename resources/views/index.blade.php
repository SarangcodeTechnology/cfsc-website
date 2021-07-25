@extends('myapp.layout')

@section('title', setting('site.title'))

@section('script')
@foreach ($modal as $item)
<script type="text/javascript">
    $(window).on('load',function(){
        $('#modal{{ $item->id }}').modal('show');
    });
</script>
@endforeach
<script>
    $('.modal').on("hidden.bs.modal", function (e) {
if ($('.modal:visible').length) {
    $('body').addClass('modal-open');
}
});
</script>
@endsection


@section('body')
<div class="container">
    @foreach ($modal as $item)

    @php
    $file=null;
    $filetype =null;
    if($item->file!='[]'){
    $file = (json_decode($item->file))[0]->download_link; $content=true;
    $fileupper = strtoupper($file);
    if (strpos($fileupper, '.PDF') !== false) {
    $filetype='pdf';
    }
    if (strpos($fileupper, '.JPG') !== false || strpos($fileupper, '.JPEG') !== false || strpos($fileupper, '.PNG') !==
    false ) {
    $filetype='img';
    }
    }
    @endphp

    <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 705px" role="document">
            <div class="modal-content" style="min-height: 90vh;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style>&times;</button>
                    @if ($item->body)
                    <div class="mt-3">
                        {!! $item->body !!}
                        @if(!empty(json_decode($item->file)))
                        <a target="_blank" href="/storage/{{json_decode($item->file)[0]->download_link}}"
                            class="bttn mt-3" style="font-size: 14px">Download Attachment</a>
                        @endif
                    </div>
                    @elseif($filetype=='pdf')
                    <iframe src="/storage/{{ $file }}" style="width:100%; height:571px;" frameborder="0"></iframe>
                    @elseif($filetype=='img')
                    <a href="{{ Voyager::image($file) }}" target="_blank"><img src="{{ Voyager::image($file) }}" alt=""
                            style="width:100%; height:auto; padding: 5px 7px; image-rendering: auto;"></a>
                    @endif
                </div>
            </div>

        </div>
    </div>
    @endforeach

</div>


<!-- Start Slider Area -->
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-9 pr-lg-1">
            <section class="hero-slider hero-style-1">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- स्लाईडर १ -->
                        @foreach ($sliders as $item)
                        <div class="swiper-slide">
                            <div class="slide-inner slide-bg-image" data-background="{{Voyager::image($item->image)}}">
                                <div class="container">
                                    <div>
                                        <span>
                                            <p>{{$item->description}}</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- end swiper-wrapper -->
                    <!-- swipper controls -->
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </section>
        </div>
        <div class="col-lg-3 pl-lg-1 mt-2 mt-lg-0">
            <div class="officer-card mt-3 mt-lg-0" style="">
                <div class="officers">
                    <div class="officer-img">
                        <img src="/images/blank-user.jpg">
                    </div>
                    <div class="officer-designation">
                        <strong>कार्यलय प्रमुख</strong>
                    </div>
                    <div class="officer-name">
                        मेरो नाम
                    </div>
                </div>
                <div class="officers">
                    <div class="officer-img">
                        <img src="images/Bishnu-Gyawali.jpg">
                    </div>
                    <div class="officer-designation">
                        <strong>सूचना अधिकारी</strong>
                    </div>
                    <div class="officer-name">
                        बिष्णु प्रशाद घिमिरे
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<section class="recentboards mt-4 mt-lg-2 p-0 mb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 pr-3 pr-lg-2 recentnotice">
                <div class="widget mb-40">
                    <h3 class="widget-title">पछिल्ला सूचना</h3>
                    <ul class="lists">
                        @foreach ($recent_notices as $item)
                        <li>
                            @php
                            $url = '#';
                            if(!empty(json_decode($item->file))){
                            $url = '/storage/'.json_decode($item->file)[0]->download_link;
                            $target = '_blank';
                            }

                            if($item->body){
                            $url = '/d/notices'.'?id='.$item->id;
                            $target = '_self';
                            }
                            @endphp
                            <a href="{{$url}}" target="{{ $target }}">{{$item->title}}</a>
                            @if($item->date)
                            <span>{{$item->date}}</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 recentprogram pr-3 pr-lg-2 pl-3 pl-lg-0 mt-2 mt-lg-0">
                <div class="widget mb-40">
                    <h3 class="widget-title">पछिल्ला कार्यक्रम</h3>
                    <ul class="lists">
                        @foreach ($recent_programs as $item)
                        <li>
                            @php
                            $url = '#';
                            if(!empty(json_decode($item->file))){
                            $url = '/storage/'.json_decode($item->file)[0]->download_link;
                            $target = '_blank';
                            }

                            if($item->body){
                            $url = '/d/programs'.'?id='.$item->id;
                            $target = '_self';
                            }
                            @endphp
                            <a href="{{$url}}" target="{{ $target }}">{{$item->title}}</a>
                            @if($item->date)
                            <span>{{$item->date}}</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 recentresources pl-3 pl-lg-0 mt-2 mt-lg-0">
                <div class="widget mb-40">
                    <h3 class="widget-title">पछिल्ला सामग्री</h3>
                    <ul class="lists">
                        @foreach ($recent_resources as $item)
                        <li>
                            @php
                            $url = '#';
                            if(!empty(json_decode($item->file))){
                            $url = '/storage/'.json_decode($item->file)[0]->download_link;
                            $target = '_blank';
                            }

                            if($item->body){
                            $url = '/d/downloads-others'.'?id='.$item->id;
                            $target = '_self';
                            }
                            @endphp
                            <a href="{{$url}}" target="{{ $target }}">{{$item->title}}</a>
                            @if($item->date)
                            <span>{{$item->date}}</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- begining of about section -->

<section class="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content-block">
                    <h3>हाम्रो बारेमा</h3>
                    <div class="text mb-40">
                        <p>खोटाङ्ग जिल्ला नेपालको सात वटा प्रदेश मध्ये प्रदेश नं. १ अन्तर्गत सगरमाथा अञ्चलमा पर्ने पहाडी
                            जिल्ला हो । यस जिल्लामा करिव ५२.५४ प्रतिशत वनक्षेत्र रहेको छ । खोटाङ जिल्ला समुन्द्र सतहबाट
                            करीव १५२ मिटर देखि ३,६२० मिटरसम्मको उचाइमा रहेका कारण वनको किसिममा पनि भिन्नता रहेको पाईन्छ
                            । यस जिल्लामा खयर सिसौ लगायतका प्रजातीहरु देखी गोब्रे सल्ला, ठिंगुरे सल्ला,लौठ सल्ला,
                            अमेरिकन सल्ला, खोटेसल्ला , चिलाउने, कटुस, साज, कर्मा लगायतका प्रजातीहरु पाईन्छ । जिल्लाको
                            मुख्य वनलाइ यसरी उपोष्ण सदाबहार वन (Tropical Forest), मौसमी पतझर वन (Sub Tropical Broad
                            Leaved Forest) र समशितोष्ण कोणधारी वन (Upper Temperate Mixed Deciduous & Coniferous Forest)
                            गरी तिन प्रकारमा विभाजन गर्न सकिन्छ । खोटाङ्ग जिल्लाको कुल क्षेत्रफल १,५४,०२० हे. मध्य वनको
                            कुल क्षेत्रफल ८०,९२९ हे. रहेको छ जसमा सामुदायिक वनको क्षेत्रफल ४८६८५.५ हे., कवुलियती वनको
                            क्षेत्रफल ८८४.६५ हे. र बाँकी राष्ट्रिय वनको क्षेत्रफल ३१३८५.८५ हे. रहेको छ ।</p>
                    </div>
                    <div class="link-btn mb-30"><a href="/s/introduction" class="bttn">थप पढ्नुहोस्</a></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image-block about-img">
                    <div class="inner-box">
                        <div class="image"> <img src="/images/dots.png" alt="about bg">
                            <div class="about-khotang-image d-none d-md-block">
                                <img class="float-bob-y" src="/" alt="homepage_image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of about section -->
{{-- <section class="social-media-link mb-2" style="background: #e7e7e7">
<div class="container my-2">

    <h3 class="d-flex justify-content-center"><strong>हाम्राे सामाजीक सञ्जाल</strong></h3>
    <div class="row d-flex justify-content-center" style="padding-top: 20px;">
        <div class="col-lg-5 samajik-sanjal">
            <div class="iframely-embed" style="max-width: 600px;"><div class="iframely-responsive" style="padding-bottom: 100%; border-radius:10px"><a href="https://www.facebook.com/dforautahat.gov.np" data-iframely-url="//cdn.iframe.ly/SotfGII?_small_header=true&_show_posts=true"></a></div></div><script async src="//cdn.iframe.ly/embed.js" charset="utf-8"></script>
        </div>
        <div class="col-lg-5 mt-2 mt-lg-0 d-flex justify-content-end samajik-sanjal">
            <div>
                <a class="twitter-timeline" href="https://twitter.com/RONBupdates" data-width="508"
                    data-height="500">Tweets by RONBupdates</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</div>
</section> --}}
@endsection