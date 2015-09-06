@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">.col-md-3</div>
            <div class="col-md-6">
                @foreach($domains as $domain)
                    <h1>
                        <a href=" {{ url('domain/'.$domain->id) }}">
                            {{ $domain->name }}
                        </a>
                    </h1>
                @endforeach
            </div>
            <div class="col-md-3">.col-md-3</div>
        </div>
    </div>



@endsection