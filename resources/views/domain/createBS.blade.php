@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">.col-md-3</div>
            <div class="col-md-6">
                <div class="page-header">
                    <h1> Create New Domain  </h1>
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
                        <label for="exampleInputEmail1">Domain Name: </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Domain Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Domain Description: </label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Domain Description">
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="privacy" id="privacy" value="0" checked>
                            Public
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="privacy" id="privacy" value="1">
                            Protected
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="privacy" id="privacy" value="2">
                            Private
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="col-md-3">.col-md-3</div>
        </div>
    </div>

@endsection