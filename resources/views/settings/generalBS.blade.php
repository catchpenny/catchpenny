@extends('settings/templateBS')

@section('userSettingsContent')

    <div class="page-header">
        <h1> General </h1>
    </div>

    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Name: </label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $currentUser->firstName . ' ' . $currentUser->lastName}}</p>
            </div>
            <label class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $currentUser->email }}</p>
            </div>
            <label class="col-sm-2 control-label">Birthday: </label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $currentUser->dateOfBirth }}</p>
            </div>
            <label class="col-sm-2 control-label">Gender: </label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $currentUser->gender }}</p>
            </div>
        </div>

    </form>

@endsection