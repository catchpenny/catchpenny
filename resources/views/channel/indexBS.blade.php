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
                                {{ '#'.$channel->name }}
                            </a>
                        </h4>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-header">
                    <h1> {{ '#'.$channel->name }} </h1>
                    <h4> {{ $channel->description }} </h4>
                </div>
            </div>
            <div class="col-md-3">
                {{--@foreach($users as $user)--}}
                    {{--<a href=""> {{ }}</a>--}}
                {{--@endforeach--}}
            </div>
        </div>
    </div>

@endsection