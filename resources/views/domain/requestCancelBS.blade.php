@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="page-header">
                    <a href=" {{ url('d/'.$domain->id.'/c/'.$domain->generalId) }}">
                        <h1> {{ $domain->name }} </h1>
                    </a>
                    <h4> {{ $domain->description }} </h4>
                </div>
                <div>
                    <h4>Join The Channel:</h4>
                    Request Has Been Already Sent
                    <form method="POST" action="{{ url('d/'.$domain->id. '/requestDestroy') }}">
                        <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                @if($domain->privacy==0)
                                    <button type="submit" class="btn btn-default">Cancel Request</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>

@endsection