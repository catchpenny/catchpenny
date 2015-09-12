@extends('domain/settings/admin/templateBS')

@section('adminContent')

    <div class="page-header">
        <h1> Settings </h1>
        <h4> Channels </h4>
    </div>
    @if ( $errors->any() )
        <ul class="alert alert-danger">
            @foreach( $errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('d/'.$domain->id.'/invite') }}">
        <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Invite New User: </label>
            <input type="text" class="form-control" id="name" name="username" placeholder="Username">
        </div>
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-default">Send Invite</button>
            </div>
        </div>
    </form>
    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            Active Users
        </div>
        <ul class="list-group">
            @foreach($domain->users as $user)
                <li class="list-group-item">
                    {{ $user->firstName . ' ' . $user->lastName}}
                    <span class="pull-right">
                        <a href="{{ url() }}">
                            Settings
                        </a>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Users Invited
        </div>
        <ul class="list-group">
            @foreach($domain->usersInvited as $user)
                <li class="list-group-item">
                    {{ $user->firstName . ' ' . $user->lastName}}
                    <span class="pull-right">
                        <a href="{{ url('d/'.$domain->id.'/invite/'.$user->id.'/destroy') }}">Cancel</a>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Users Requests
        </div>
        <ul class="list-group">
            @foreach($domain->usersRequested as $user)
                <li class="list-group-item">
                    {{ $user->firstName . ' ' . $user->lastName}}
                    <span class="pull-right">
                        <a href="{{ url('d/'.$domain->id.'/request/'.$user->id.'/accept') }}">Accept</a>
                        <a href="{{ url('d/'.$domain->id.'/request/'.$user->id.'/cancel') }}">Cancel</a>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Users Blocked
        </div>
        <ul class="list-group">
            @foreach($domain->usersBlocked as $user)
                <li class="list-group-item">
                    {{ $user->firstName . ' ' . $user->lastName}}
                    <span class="pull-right">Remove</span>
                </li>
            @endforeach
        </ul>
    </div>

@endsection