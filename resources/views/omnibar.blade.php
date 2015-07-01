<!-- resources/views/auth/register.blade.php -->
@extends('material/template')

@section('title', 'Omnibar')

@section('content')
    <body ng-app="OmniBar" class="fullbleed layout vertical">
    <link rel="import" href="{{ url('elements/omnibar.html') }}">
    <omni-bar></omni-bar>
@endsection