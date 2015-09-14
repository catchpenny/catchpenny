@extends('domain/settings/admin/templateBS')

@section('adminContent')

    <div class="page-header">
        <h1>{{ $user->firstName.' '.$user->lastName }}</h1>
        <h4> Settings </h4>
    </div>
    @if ( $errors->any() )
        <ul class="alert alert-danger">
            @foreach( $errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    @endif

    @if(\App\DomainSubscriptions::where('domainId',$domain->id)->where('userId',$user->id)->first()->level==1)
        <form method="POST" action="">
            <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-default">Remove Moderator</button>
                </div>
            </div>
        </form>
    @else
        <form method="POST" action="">
            <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-default">Make Moderator</button>
                </div>
            </div>
        </form>
    @endif
    <br>
    <form method="POST" action="{{ url('d/'.$domain->id.'/ban') }}">
        <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <input type="hidden" class="form-control" id="name" name="username" placeholder="Username" value="{{ $user->email }}">
        </div>
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-default">Remove User</button>
            </div>
        </div>
    </form>
    <br>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href=" {{ url('d/'.$domain->id.'/settings/users') }}">
                <button type="button" class="btn btn-default">Go Back</button>
            </a>
        </div>
    </div>

@endsection