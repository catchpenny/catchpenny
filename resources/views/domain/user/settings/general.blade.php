@extends('bootstrap.template')

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

                <div class="page-header">
                    <h1> Settings </h1>
                    <h4> General </h4>
                </div>

                <form method="POST" action="{{ url('d/'.$domain->id.'/destroy') }}">
                    <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-default">Leave Domain</button>
                        </div>
                    </div>
                </form>
                <br><br>

            </div>
            <div class="col-md-3">.col-md-3</div>
        </div>
    </div>

@endsection