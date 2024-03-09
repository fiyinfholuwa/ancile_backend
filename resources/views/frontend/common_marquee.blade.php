@if($ribbon != NULL)
    @if($ribbon->display == 'yes')
        <marquee style="font-size: 16px;
                        font-weight: 500;
                        color: #fff;
                        background-color: #ff6430;
                        margin-bottom: -5px;
                        padding: 10px 0px;
                        position: fixed;
                        width: 100%;
                        top: 0;
                        z-index: 9999;">
            {{$ribbon->body}}
        </marquee>
    @endif
@endif
