@extends('myapp.layout')




@if(request('id'))
    @php
        $req_data = \App\Lists::where('id',request('id'))->first();
        $hasParent = 1;
        $s_title = $data->title;
        $data['title'] = $req_data->title;
    @endphp
@endif

@section('title',$data->title.', '.setting('site.title'))


@section('body')

    <!-- Breadcrumbs -->
    @include('include.breadcrumps',[
        's_title',
        'hasParent',
        'title'=>$data->title,
        ])
    <!-- End Breadcrumbs -->
    <!-- Start Feature section Area -->
    <div class="inner-content-wrapper blog-sec blog-area">
        <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 mb-30">
            <div class="blog-details">
                <div class="post-text mb-20">
                    @if(!request('id'))
                    <ul class="lists">
                        @foreach ($body as $item)
                        <li>
                            @php
                                $url = '#';
                                if(!empty(json_decode($item->file))){
                                    $url = '/storage/'.json_decode($item->file)[0]->download_link;
                                    $target = '_blank';
                                }

                                if($item->body){
                                    $url = '/d/'.$data->slug.'?id='.$item->id;
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
                    @else
                        {{-- List Body --}}
                        {!! $req_data->body !!}
                        @if(!empty(json_decode($req_data->file)))
                            <a target="_blank" href="/storage/{{json_decode($req_data->file)[0]->download_link}}" class="bttn mt-3" style="font-size: 14px">Download Attachment</a>
                        @endif
                    @endif
                </div>
            </div>
            </div>
            @include('include.sidebar',['s_lists','s_title'])
        </div>
        </div>
    </div>
@endsection




