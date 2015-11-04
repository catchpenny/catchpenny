@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

@section('content')

    <style>
        .no-margin{
            margin: 0px !important;
        }

        .no-padding{
            padding: 0px !important;
        }

        .white-font{
            color: white;
        }

        .auto-overflow{
            overflow: auto;
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

        .form-wrap{
            position: absolute;
            bottom: 0px;
            right: 0;
            left: 0;
            margin: auto;
            width: 100%;
            padding: 15px;
        }

    </style>

    <script>

        $(document).ready(function(){
            $('.auto-overflow').height($(window).height() - $('.navbar').outerHeight(true));
            $('.msg-wrap').height($(window).height() - $('.navbar').outerHeight(true) - $('.channel-header').outerHeight(true) - $('.form-wrap').outerHeight(true));
        });

        $(window).resize(function(){
            $('.auto-overflow').height($(window).height() - $('.navbar').outerHeight(true));
            $('.msg-wrap').height($(window).height() - $('.navbar').outerHeight(true) - $('.channel-header').outerHeight(true) - $('.form-wrap').outerHeight(true));
        });

    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-3 auto-overflow hidden-sm hidden-xs" >
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
            <div class="col-md-9 auto-overflow">
                <div class="page-header channel-header" style="margin: 0px;">
                    <h3>#general <small>this channel is for general talks</small></h3>
                </div>

                <div class="msg-wrap auto-overflow" id="msg-wrap">

                    <div id="loading-div" class="loading" align="center" style="margin: 10px;">
                        <a id="loading" href="{{ $currentChannel->id }}/posts/?page={{ $channel_messages->currentPage() + 1 }}">Load Previous Messages</a>
                    </div>

                    <div class="messages">
                        @foreach (array_reverse($channel_messages->toArray()['data']) as $msg)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="{{ url('api/image/'. $msg['created_by_id'] . '/profile/photoSmall') }}" data-holder-rendered="true">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"> {{ $msg['created_by'] }} <small> <span class="time-from-now" data-date="{{ $msg['created_at'] }}"></span></small></h4>
                                    <p>{{ $msg['body'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="form-wrap">
                    <form action="fire" method="POST" name="form1" id="form1">
                        <div class="send-wrap">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="_jwttoken" value="{{ $_jwttoken }}">
                            <textarea class="form-control send-message" rows="3" placeholder="Write a reply..." id="m" name="message" autocomplete="off"></textarea>
                        </div>
                        <div class="btn-panel">
                            <a href="" class=" col-lg-3 btn   send-message-btn " role="button"><i class="fa fa-cloud-upload"></i> Add Files</a>
                            <button class=" col-lg-4 text-right btn   send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> Send Message</button>
                        </div>
                    </form>
                </div>

            </div>
            {{--<div class="col-md-2">--}}

                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                        {{--Users--}}
                    {{--</div>--}}
                    {{--<ul class="list-group">--}}
                        {{--@foreach($channel->users as $user)--}}
                            {{--<li class="list-group-item">--}}
                                {{--{{ $user->firstName . ' ' . $user->lastName}}--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}

                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                        {{--Notifications--}}
                    {{--</div>--}}
                    {{--<ul class="list-group">--}}
                        {{--@foreach($channel->users as $user)--}}
                        {{--<li class="list-group-item">--}}
                        {{--{{ $user->firstName . ' ' . $user->lastName}}--}}
                        {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}

            {{--</div>--}}
        </div>
    </div>

    <script>

        $(document).ready(function(){

            $('.msg-wrap').animate({scrollTop: $('.msg-wrap')[0].scrollHeight});

            //Helper Function
            function getURLParameter(url, name) {
                return (RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1];
            }

            var domain = window.location.href.split("/")[window.location.href.split("/").length - 3];
            var channel = window.location.href.split("/")[window.location.href.split("/").length - 1];

            var socket_connect = function (domain) {
                return io(window.location.origin + ':6001', {
                    query: {
                        'domain' : domain,
                        'channel' :channel,
                        'jwttoken' : $('input[name=_jwttoken]').val(),
                        'name' : '{{ $currentUser->firstName . ' ' . $currentUser->lastName }}'
                    }
                });
            };

            var socket        = socket_connect(domain);
            var socketchannel = "test-channel:App\\Events\\TestEvents\\"+channel;

            socket.on(socketchannel, function(message){
                var messagehtml =   '<div class="media">'
                                            + '<div class="media-left">'
                                                + '<a href="#">'
                                                    + '<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="/api/image/' + message.data.fromId + '/profile/photoSmall" data-holder-rendered="true">'
                                                + ' </a>'
                                            + '</div>'
                                            + '<div class="media-body">'
                                                + '<h4 class="media-heading"> '+message.data.from+' <small> <span class="time-from-now" data-date="'+message.data.time+'"></span></small></h4>'
                                                + '<p>'+message.data.m+'</p>'
                                            + '</div>'
                                     + '</div>';
                $(".msg-wrap").append(messagehtml);
                $('.msg-wrap').animate({scrollTop: $('.msg-wrap')[0].scrollHeight});
            });

            $('#form1').submit(function(event) {
                if($('textarea[name=message]').val()!=''){
                    var formData = {
                        '_token'              : $('input[name=_token]').val(),
                        'message'             : $('textarea[name=message]').val()
                    };
                    $.ajax({
                        type        : 'POST',
                        url         : '/fire/' + domain + '/c/' + channel,
                        data        : formData,
                        dataType    : 'json',
                        encode      : true
                    })
                            .done(function(data) {
                                $('#m').val('');
                                $('.msg-wrap').animate({scrollTop: $('.msg-wrap')[0].scrollHeight});
                            });
                }
                event.preventDefault();
            });


            $('#loading-div').on( "click", "a#loading", function (event) {
                $("#loading").text('Loading! Please wait');
                event.preventDefault();
                event.stopPropagation();
                var url = ($(this).attr('href'));
                var page = getURLParameter(url, 'page');
                $.getJSON(url)
                        .success(function (data) {
                            $.each(data.data, function(key, val) {

                                var messagehtml =   '<div class="media">'
                                        + '<div class="media-left">'
                                        + '<a href="#">'
                                        + '<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="/api/image/' + val.created_by_id + '/profile/photoSmall" data-holder-rendered="true">'
                                        + ' </a>'
                                        + '</div>'
                                        + '<div class="media-body">'
                                        + '<h4 class="media-heading"> '+val.created_by+'<small> <span class="time-from-now" data-date="'+val.created_at+'"></span></small></h4>'
                                        + '<p>'+val.body+'</p>'
                                        + '</div>'
                                        + '</div>';
                                $(".messages").prepend(messagehtml);
                            });

                            if (data.next_page_url)
                            {
                                $('a#loading').attr('href',  data.next_page_url);
                                $("#loading").text('Load Previous Messages');
                            }else{
                                $("#loading").remove();
                                $("#loading-div").text('No Previous Messages');
                            }
                        });
            });
        });

        $(document).ready(function(){
            (function timeCheck() {
                $('span.time-from-now', $('.msg-wrap')).each(function () {
                    var item = $(this);
                    date = moment($(this).attr('data-date'));
                    item.html(date.fromNow());
                })
                setTimeout(timeCheck, 10000);
            })();
        });



    </script>

@endsection