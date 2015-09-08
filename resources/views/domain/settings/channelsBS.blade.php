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
                </div>
            </div>
            <div class="col-md-6">
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
                        <label for="exampleInputEmail1">Create New Channel: </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Channel Name">
                    </div>
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-default">Create</button>
                        </div>
                    </div>
                </form>
                <br><br>
                <h4>Current Channels:</h4>
                <table class="table table-hover">
                    @foreach($channels as $channel)
                    <tr>
                        <td>
                            {{ $channel->name }}
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
            <div class="col-md-3">.col-md-3</div>
        </div>
    </div>

@endsection