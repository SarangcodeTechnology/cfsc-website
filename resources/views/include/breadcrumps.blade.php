@php
    if(isset($cover)){
        $cover_link = $cover;
    }
    else{
        $cover_link = 'https://unsplash.com/photos/Bkci_8qcdvQ/download?force=true&w=640';
    }
@endphp

<div class="breadcrumbs" style="background: #424242">
    <div class="container">
    <div class="bread-inner">
        <div class="row">
        <div class="col-12">
            <h2>{{$title}}</h2>
            <ul class="bread-list">
            <li><a href="/">गृहपृष्ठ</a></li>
            @if($hasParent)
            <li><i class="icofont-simple-right"></i></li>
                @if(isset($s_link))
                <li><a href="{{$s_link}}">{{$s_title}}</a></li>
                @else
                <li>{{$s_title}}</li>
                @endif
            @endif
            <li><i class="icofont-simple-right"></i></li>
            <li class="active">{{$title}}</li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</div>
