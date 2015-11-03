@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

<style>

    .conversation
    {
        padding:5px;
        border-bottom:1px solid #ddd;
        margin:0;

    }

    .message-wrap
    {
        box-shadow: 0 0 3px #ddd;
        padding:0;

    }
    .msg
    {
        padding:5px;
        /*border-bottom:1px solid #ddd;*/
        margin:0;
    }
    .msg-wrap
    {
        padding:10px;
        max-height: 400px;
        overflow: auto;

    }

    .time
    {
        color:#bfbfbf;
    }

    .send-wrap
    {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        padding:10px;
        /*background: #f8f8f8;*/
    }

    .send-message
    {
        resize: none;
    }

    .highlight
    {
        background-color: #f7f7f9;
        border: 1px solid #e1e1e8;
    }

    .send-message-btn
    {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;

        border-bottom-right-radius: 0;
    }
    .btn-panel
    {
        background: #f7f7f9;
    }

    .btn-panel .btn
    {
        color:#b8b8b8;

        transition: 0.2s all ease-in-out;
    }

    .btn-panel .btn:hover
    {
        color:#666;
        background: #f8f8f8;
    }
    .btn-panel .btn:active
    {
        background: #f8f8f8;
        box-shadow: 0 0 1px #ddd;
    }

    .btn-panel-conversation .btn,.btn-panel-msg .btn
    {

        background: #f8f8f8;
    }
    .btn-panel-conversation .btn:first-child
    {
        border-right: 1px solid #ddd;
    }

    .msg-wrap .media-heading
    {
        color:#003bb3;
        font-weight: 700;
    }

    .form-wrap{
        margin-bottom: 0px;
    }


    .msg-date
    {
        background: none;
        text-align: center;
        color:#aaa;
        border:none;
        box-shadow: none;
        border-bottom: 1px solid #ddd;
    }


    body::-webkit-scrollbar {
        width: 12px;
    }


    /* Let's get this party started */
    ::-webkit-scrollbar {
        width: 6px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        /*        -webkit-border-radius: 10px;
                border-radius: 10px;*/
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        /*        -webkit-border-radius: 10px;
                border-radius: 10px;*/
        background:#ddd;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
    }
    ::-webkit-scrollbar-thumb:window-inactive {
        background: #ddd;
    }

</style>

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="page-header">
                    <a href=" {{ url('d/'.$domain->id.'/c/'.$domain->generalId) }}">
                        <h1> {{ $domain->name }} </h1>
                    </a>
                    <h4> {{ $domain->description }} </h4>
                    <p><a href=" {{ url('d/'. $domain->id .'/settings') }} ">Settings</a></p>
                </div>
                <div>
                    @foreach($channels as $channel)
                        <h4>
                            <a href=" {{ url('d/'.$channel->domainId.'/c/'.$channel->id) }}">
                                @if( $currentChannel->id == $channel->id )
                                    <b>{{ '#'.$channel->name }}</b>
                                @else
                                    {{ '#'.$channel->name }}
                                @endif
                            </a>
                        </h4>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-header" style="margin-bottom: 0px;">
                    <h1>{{ '#'.$currentChannel->name }} <small>{{ $currentChannel->description }}</small></h1>
                </div>

                {{--start--}}
                <div class="row">

                    <div class="message-wrap">

                        <div class="msg-wrap" id="msg-wrap">

                            {{--<div class="alert alert-info msg-date">--}}
                                {{--<strong>Today</strong>--}}
                            {{--</div>--}}

                        </div>
                    </div>
                        <div class="form-wrap">
                            <form action="fire" method="POST" name="form1" id="form1">
                                <div class="send-wrap">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="_jwttoken" value="{{ $_jwttoken }}">
                                    <textarea class="form-control send-message" rows="3" placeholder="Write a reply..." id="m" name="m" autocomplete="off"></textarea>
                                </div>
                                <div class="btn-panel">
                                    <a href="" class=" col-lg-3 btn   send-message-btn " role="button"><i class="fa fa-cloud-upload"></i> Add Files</a>
                                    <button class=" col-lg-4 text-right btn   send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> Send Message</button>
                                </div>
                            </form>
                        </div>

                </div>
                {{--end--}}

            </div>
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Users
                    </div>
                    <ul class="list-group">
                        @foreach($channel->users as $user)
                            <li class="list-group-item">
                                 {{ $user->firstName . ' ' . $user->lastName}}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Notifications
                    </div>
                    <ul class="list-group">
                        {{--@foreach($channel->users as $user)--}}
                            {{--<li class="list-group-item">--}}
                                {{--{{ $user->firstName . ' ' . $user->lastName}}--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-2.1.3.js') }}"></script>
    <script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/socket.io.js') }}"></script>

    <script>


        $(document).ready(function(){

            var domain = window.location.href.split("/")[window.location.href.split("/").length - 3];
            var channel = window.location.href.split("/")[window.location.href.split("/").length - 1];

            var socket_connect = function (domain) {
                return io(window.location.origin + ':6001', {
                    query: { 'domain' : domain,
                             'channel' :channel,
                             'jwttoken' : $('input[name=_jwttoken]').val(),
                             'name' : '{{ $currentUser->firstName . ' ' . $currentUser->lastName }}'
                           }
                });
            };

            var socket      = socket_connect(domain);

            var socketchannel = "test-channel:App\\Events\\TestEvents\\"+channel;

            socket.on(socketchannel, function(message){
                var messagehtml = '<div class="media msg">'
                        +'<a class="pull-left" href="#">'
                        +'<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">'
                        +'</a>'
                        +'<div class="media-body">'
                        +'<small class="pull-right time"><i class="fa fa-clock-o"></i> 12:10am </small>'
                        +'<h5 class="media-heading">'+message.data.from+'</h5>'
                        +'<small class="col-lg-10">'+message.data.m+'</small>'
                        +'</div>'
                        +'</div>';
                console.log(message.data.domain+ ' ' + message.data.channel);

                $("#msg-wrap").append(messagehtml);
            });


            // Sending through post request
            $('#form1').submit(function(event) {
                var formData = {
                    '_token'              : $('input[name=_token]').val(),
                    'm'                   : $('textarea[name=m]').val()
                };
                $.ajax({
                    type        : 'POST',
                    url         : '/fire/' + domain + '/c/' + channel,
                    data        : formData,
                    dataType    : 'json',
                    encode          : true
                })
                        .done(function(data) {
                            console.log(data);
                            $('#m').val('');
                            $('#msg-wrap').animate({scrollTop: $('#msg-wrap')[0].scrollHeight});
                        });
                event.preventDefault();
            });

        });
    </script>

@endsection