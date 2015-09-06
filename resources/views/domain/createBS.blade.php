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

                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->

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
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="col-md-3">.col-md-3</div>
        </div>
    </div>

@endsection