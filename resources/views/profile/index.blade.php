@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <link rel="import" href="{{ url('elements/new-status.html') }}">
    <link rel="import" href="{{ url('elements/omni-bar-tall.html') }}">

    <div ng-app="profileModel" ng-controller="profileCtrl">
        <div layout="column" layout-fill>
            <omni-bar>
                <paper-icon-button src="{{ url('api/image/') }}/{{ $profile->photoSmall }}"></paper-icon-button>
                {{--<md-toolbar>--}}
                {{--<div class="md-toolbar-tools">--}}
                    {{--<span>CatchPenny Project</span>--}}
                    {{--<!-- fill up the space between left and right area -->--}}
                    {{--<span flex></span>--}}
                    {{--<span flex="50">--}}
                        {{--<md-autocomplete md-selected-item="selectedItem" md-search-text="searchText"--}}
                                         {{--md-items="item in getMatches(searchText)" md-item-text="item.display">--}}
                            {{--<md-item-template>--}}
                                {{--<span md-highlight-text="searchText">@{{item.display}}</span>--}}
                            {{--</md-item-template>--}}
                            {{--<md-not-found>--}}
                                {{--No matches found.--}}
                            {{--</md-not-found>--}}
                        {{--</md-autocomplete>--}}
                    {{--</span>--}}
                    {{--<span flex></span>--}}
                    {{--<md-button>--}}
                        {{--Right Bar Button--}}
                    {{--</md-button>--}}
                {{--</div>--}}
            {{--</md-toolbar>--}}
            <md-content class="md-padding">

                <div layout="column" id="testmargin">
                    <md-card layout>
                        <img ng-src="{{ url('api/image/'.$profile->coverBig) }}" class="md-card-image" alt="Washed Out"
                             style="height: 500px;">
                        <md-card-content>
                            <h2 class="md-title">{{ $user->firstName }} {{ $user->lastName }}</h2>

                            <p>
                                {{ $profile->aboutMe }}
                            </p>

                            <p>
                                {{ $user->dateOfBirth }}
                                {{ $user->gender }}
                                {{ $profile->relationshipStatus }}
                                {{ $profile->contactEmail }}
                                {{ $profile->contactNumber }}
                                {{ $profile->city }}
                                {{ $profile->country }}
                            </p>
                        </md-card-content>
                        <div class="md-actions" layout="row" layout-align="end center">
                            @if ($profile->self)
                                <a href="{{ url('profile/edit') }}">
                                    <md-button>Edit</md-button>
                                </a>
                            @else
<<<<<<< HEAD
                                @if ($user->following)
                                    <a href="{{ url('api/follow/remove') }}/{{$user->id}}"><md-button>Unfollow</md-button></a>
                                @else
                                    <a href="{{ url('api/follow/add') }}/{{$user->id}}"><md-button class="md-raised md-primary">Follow</md-button></a>
                                @endif
=======
                                <a href="{{ url('api/follow/add') }}/{{$user->id}}">
                                    <md-button class="md-raised md-primary">Follow</md-button>
                                </a>
                                <a href="{{ url('api/follow/remove') }}/{{$user->id}}">
                                    <md-button>Unfollow</md-button>
                                </a>
>>>>>>> 66f768d21165d67ef5064701bc308157ba9e0016
                            @endif
                        </div>
                    </md-card>
                </div>
                <div layout="row">
                    <div flex="20" hide-sm>
                        <md-card layout>
                            <img ng-src="{{ url('api/image/') }}/{{ $profile->photoMedium }}" class="md-card-image"
                                 alt="Washed Out" style="height: 150px;">
                            <md-card-content>
                                <h2 class="md-title">{{ $user->firstName . ' ' . $user->lastName }}</h2>

                                <p>
                                    {{ $profile->aboutMe }}
                                </p>
                            </md-card-content>
                            <div class="md-actions" layout="row" layout-align="end center">
                                <a href="{{ url('profile/edit') }}">
                                    <md-button>Edit</md-button>
                                </a>
                            </div>
                        </md-card>
                    </div>
                    <div flex>
                        <div layout="column" layout-fill>
                            <form name="newStatus" action="{{ url('api/post/create/') }}" method="post">
                                {!! csrf_field() !!}
                                @if (count($errors) > 0)
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <new-status></new-status>

                            </form>
                            @foreach($posts as $post)
                            <md-whiteframe class="md-whiteframe-z1" layout layout-align="center center">
                                <div layout="column" style="width:100%;">
                                    <md-list>
                                        <md-list-item class="md-2-line">
                                            <img ng-src="{{ url('api/image/') }}/{{ $profile->photoSmall }}" class="md-avatar"
                                                 alt="Washed Out">

                                            <div class="md-list-item-text">
                                                <h3>{{ $user->firstName }}</h3>
                                                <p>{{ $post->content }}</p>
                                            </div>
                                        </md-list-item>
                                    </md-list>

                                </div>
                            </md-whiteframe>
                            @endforeach

                        </div>

                    </div>
                    <div flex="20" hide-sm>
                        <md-whiteframe class="md-whiteframe-z2" layout>
                            <span>.md-whiteframe-z2</span>
                        </md-whiteframe>
                    </div>
                </div>
            </md-content>

            </omni-bar>
        </div>
    </div>
    </body>
@endsection