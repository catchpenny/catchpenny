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
                    @if(App\DomainSubscriptions::where('userId',$currentUser->id)->where('domainId',$domain->id)->select('level')->first()->level==0)
                        <p><a href=" {{ url('d/'. $domain->id .'/settings') }} ">Settings</a></p>
                    @endif
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
                    <h1> {{ '#'.$currentChannel->name }} </h1>
                    <h4> {{ $currentChannel->description }} </h4>
                </div>
            </div>
            <div class="col-md-3">
                @foreach($channel->users as $user)
                {{ $user->firstName . ' ' . $user->lastName}}
                @endforeach
            </div>
        </div>
    </div>

@endsection