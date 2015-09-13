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
                    @if($domainRequest)
                    Request Has Been Already Sent
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <a href="{{ url('d/'.$domain->id. '/request/'.$currentUser->id.'/cancel') }}"><button type="submit" class="btn btn-default">Cancel Request</button></a>
                            </div>
                        </div>
                    @endif
                    @if($domainInvite)
                        Domain Invitation
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    <a href="{{ url('d/'.$domain->id. '/invite/accept') }}"><button type="submit" class="btn btn-default">Confirm Invitation</button></a>
                                </div>
                            </div>
                        <br><br>
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    <a href="{{ url('d/'.$domain->id.'/invite/cancel') }}"><button type="submit" class="btn btn-default">Cancel Invitation</button></a>
                                </div>
                            </div>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>

@endsection