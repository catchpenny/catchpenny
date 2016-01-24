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
                </div>
                <div>
                    <h5><a href="{{ url('d/'.$domain->id.'/settings/') }}">General</a></h5>
                    <h5><a href="{{ url('d/'.$domain->id.'/settings/users') }}">Users</a></h5>
                    <h5><a href="{{ url('d/'.$domain->id.'/settings/channels') }}">Channels</a></h5>
                    <h5><a href="{{ url('d/'.$domain->id.'/settings/notifications') }}">Notifications</a></h5>
                </div>
            </div>
            <div class="col-md-6">
                @yield('adminContent')
            </div>
            <div class="col-md-3">.col-md-3</div>
        </div>
    </div>

@endsection