@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

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
                <div class="page-header">
                    <h1>{{ '#'.$currentChannel->name }} <small>{{ $currentChannel->description }}</small></h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="page-header">
                    <h3> Channel Members </h3>
                </div>
                @foreach($channel->users as $user)
                    <h4> {{ $user->firstName . ' ' . $user->lastName}} </h4>
                @endforeach
            </div>
        </div>
    </div>

@endsection