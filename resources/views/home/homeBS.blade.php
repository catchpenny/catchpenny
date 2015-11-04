@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="profile-sidebar" align="center">
                    <!-- SIDEBAR USERPIC -->
                    <div>
                        <img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 180px; height: 180px;"
                             src="{{ url('api/image/'. $currentUser->id . '/profile/photoMedium') }}" data-holder-rendered="true">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <a href="{{ url('u/' . $currentUser->id) }}">
                                <h3> {{ $currentUser->firstName.' '.$currentUser->lastName }} </h3>
                            </a>
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                </div>
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