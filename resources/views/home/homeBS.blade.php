@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 180px; height: 180px;"
                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTA4MzEwOThmOSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MDgzMTA5OGY5Ij48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjYxMjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
                <div class="page-header">
                    <a href="{{ url('u/' . $currentUser->id) }}">
                    <h1> {{ $currentUser->firstName.' '.$currentUser->lastName }} </h1>
                    </a>
                </div>

                {{--<ul class="list-group">--}}
                    {{--<li class="list-group-item">--}}
                        {{--Friends--}}
                    {{--</li>--}}
                {{--</ul>--}}

                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge">14</span>
                        Messages
                    </li>
                    <li class="list-group-item">
                        Friends
                    </li>
                    <li class="list-group-item">
                        Domains
                    </li>
                </ul>

            </div>
            <div class="col-md-6">

                <div class="page-header">
                    <h1> Domains </h1>
                </div>

                <div class="row">
                @foreach($domains as $domain)

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="min-height: 180px; min-width: 150px;">
                                <div class="caption">
                                    <h3>
                                        <a href=" {{ url('d/'.$domain->id.'/c/'.$domain->generalId) }}">
                                            {{ $domain->name }}
                                        </a>
                                    </h3>
                                    <p> {{ $domain->description }} </p>
                                </div>
                            </div>
                        </div>

                @endforeach
                </div>

            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                         Notifications
                    </div>
                        <!-- List group -->
                        <ul class="list-group">
                            @foreach($notifications as $notification)
                                <li class="list-group-item">
                                {{--{{ $notification->read }}--}}
                                {{--{{ $notification->type }}--}}
                                    @if($notification->url)
                                        <a href="{{ 'n/'.$notification->id }}">
                                            {{ $notification->data }}
                                        </a>
                                    @else
                                        {{ $notification->data }}
                                    @endif
                                    <br>
                                    <a href=" {{ url('n/'.$notification->id.'/delete') }}">Delete</a>
                                    @if($notification->accept)
                                        <a href=" {{ url('n/'.$notification->id.'/accept') }}">Accept</a>
                                    @endif
                                    @if($notification->cancel)
                                        <a href=" {{ url('n/'.$notification->id.'/cancel') }}">Cancel</a>
                                    @endif
                               </li>
                            @endforeach

                        </ul>
                    </div>
            </div>
        </div>
    </div>



@endsection