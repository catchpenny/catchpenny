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

        <form method="POST" action="{{ url('d/'. $domain->id .'/channel/create') }}">
            <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="form-group">
                <label for="name">Create New Channel: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Channel Name">
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Channel Descripton">
            </div>
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>
            </div>
        </form>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Channels
            </div>
            <ul class="list-group">
                @foreach($channels as $channel)
                    <li class="list-group-item">
                        {{ $channel->name }} <span class=" pull-right">Settings</span>
                    </li>
                @endforeach
            </ul>
        </div>

@endsection