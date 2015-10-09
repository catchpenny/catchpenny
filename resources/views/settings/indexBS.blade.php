@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="page-header">
                    <h1> Settings </h1>
                    <p>{{ $currentUser->firstName.' '.$currentUser->lastName }}</p>
                </div>
                <div>
                    <h5><a href="{{ url('settings') }}">General</a></h5>
                    <h5><a href="{{ url('settings/profile') }}">Profile</a></h5>
                    <h5><a href="{{ url('/settings/domains') }}">Domains</a></h5>
                    <h5><a href="{{ url('/settings/security') }}">Security</a></h5>
                    <h5><a href="{{ url('/settings/privacy') }}">Privacy</a></h5>
                </div>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>



@endsection