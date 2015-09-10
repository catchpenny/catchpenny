@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="page-header">
                    <h1> {{ $currentUser->firstName.' '.$currentUser->lastName }} </h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-header">
                    <h1> Domains </h1>
                </div>
                @foreach($domains as $domain)
                    <h3>
                        <a href=" {{ url('d/'.$domain->id.'/c/'.$domain->generalId) }}">
                            {{ $domain->name }}
                        </a>
                    </h3>
                    <p> {{ $domain->description }} </p>

                @endforeach
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