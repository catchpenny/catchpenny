@extends('domain/settings/admin/templateBS')

@section('adminContent')

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            Notifications
        </div>
        <!-- List group -->
        <ul class="list-group">
            @if(!$notifications->isEmpty())
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
            @else
                <li class="list-group-item">
                    No Notifications
                </li>
            @endif
        </ul>
    </div>
@endsection