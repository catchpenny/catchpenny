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

    <form method="POST" action="">
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
    <h4>Current Users:</h4>
    <table class="table table-hover">
        @foreach($domain->users as $user)
            {{ $user->firstName . ' ' . $user->lastName}}
        @endforeach
    </table>

@endsection