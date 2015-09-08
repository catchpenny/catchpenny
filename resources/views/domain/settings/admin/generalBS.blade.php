@extends('domain/settings/admin/templateBS')

@section('adminContent')

                <div class="page-header">
                    <h1> Settings </h1>
                    <h4> General </h4>
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
                        <label for="exampleInputEmail1">Edit Domain Name: </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Domain Name" value="{{ $domain->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Edit Domain Description: </label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Domain Description" value="{{ $domain->description }}">
                    </div>
                    @for($i = 0; $i<=2 ;$i++)
                        <div class="radio">
                            <label>
                                @if($domain->privacy == $i)
                                    <input type="radio" name="privacy" id="privacy" value="{{$i}}" checked>
                                @else
                                    <input type="radio" name="privacy" id="privacy" value="{{$i}}">
                                @endif
                                @if($i==0)
                                    Public
                                @elseif($i==1)
                                    Protected
                                @else
                                    Private
                                @endif
                            </label>
                        </div>
                    @endfor
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-default">Save</button>
                        </div>
                        <div class="btn-group" role="group">
                            <a href=" {{ url('d/'.$domain->id.'/c/'.$domain->generalId) }}">
                                <button type="button" class="btn btn-default">Cancel</button>
                            </a>
                        </div>
                    </div>
                </form>
                <br>
                <form method="POST" action="{{ url('d/'.$domain->id.'/destroy') }}">
                    <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-default">Delete Domain</button>
                        </div>
                    </div>
                </form>

@endsection