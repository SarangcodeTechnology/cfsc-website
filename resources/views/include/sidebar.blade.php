<div class="col-xl-3 col-lg-3 mb-30">
    <div class="widget mb-40">
        <h3 class="widget-title">{{$s_title}}</h3>
        <ul class="service-list">
        @foreach ($s_lists as $item)
        <li> <a href="{{$item->url}}">{{$item->title}}</a> </li>
        @endforeach
        </ul>
    </div>
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
