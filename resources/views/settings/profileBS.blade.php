@extends('settings/templateBS')

@section('userSettingsContent')

    <div class="page-header">
        <h1> Profile </h1>
    </div>

    <form action="" method="post">
        <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">About Me</label>
            <input type="text" class="form-control" name="aboutMe" id="aboutMe" placeholder="About Me" value="{{ $profile->aboutMe }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Relationship Status</label>
            <input type="text" class="form-control" name="relationshipStatus" id="relationshipStatus" placeholder="Relationship Status" value="{{ $profile->relationshipStatus }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Contact Number</label>
            <input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="Contact Number" value="{{ $profile->contactNumber }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">City</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City" value="{{ $profile->city }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Country</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="{{ $profile->country }}">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Profile Photo</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Cover Photo</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <button type="submit" class="btn btn-default"> Update </button>
    </form>



@endsection