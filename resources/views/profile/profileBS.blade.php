@extends('bootstrap/template')

@section('title', 'CatchPenny | Home')

<style>
    *{
        font-family: 'Open Sans', sans-serif;
    }

    .well {
        margin-top:-20px;
        background-color:#007FBD;
        border:2px solid #0077B2;
        text-align:center;
        cursor:pointer;
        font-size: 25px;
        padding: 15px;
        border-radius: 0px !important;
    }

    .well:hover {
        margin-top:-20px;
        background-color:#0077B2;
        border:2px solid #0077B2;
        text-align:center;
        cursor:pointer;
        font-size: 25px;
        padding: 15px;
        border-radius: 0px !important;
        border-bottom : 2px solid rgba(97, 203, 255, 0.65);
    }

    body {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #fff;
        background-color: #F1F1F1;
    }



    .bg_blur
    {
        background-image:url('http://data2.whicdn.com/images/139218968/large.jpg');
        height: 300px;
        background-size: cover;
    }

    .follow_btn {
        text-decoration: none;
        position: absolute;
        left: 35%;
        top: 42.5%;
        width: 35%;
        height: 15%;
        background-color: #007FBE;
        padding: 10px;
        padding-top: 6px;
        color: #fff;
        text-align: center;
        font-size: 20px;
        border: 4px solid #007FBE;
    }

    .follow_btn:hover {
        text-decoration: none;
        position: absolute;
        left: 35%;
        top: 42.5%;
        width: 35%;
        height: 15%;
        background-color: #007FBE;
        padding: 10px;
        padding-top: 6px;
        color: #fff;
        text-align: center;
        font-size: 20px;
        border: 4px solid rgba(255, 255, 255, 0.8);
    }

    .header{
        color : #808080;
        margin-left:10%;
        margin-top:70px;
    }

    .picture{
        height:150px;
        width:150px;
        position:absolute;
        top: 75px;
        left:-75px;
    }

    .picture_mob{
        position: absolute;
        width: 35%;
        left: 35%;
        bottom: 70%;
    }

    .btn-style{
        color: #fff;
        background-color: #007FBE;
        border-color: #adadad;
        width: 33.3%;
    }

    .btn-style:hover {
        color: #333;
        background-color: #3D5DE0;
        border-color: #adadad;
        width: 33.3%;

    }


    @media (max-width: 767px) {
        .header{
            text-align : center;
        }



        .nav{
            margin-top : 30px;
        }
    }


    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

</style>

@section('content')

    <div class="container">


        <div class="row panel">
            <div class="col-md-4 bg_blur ">
                <a href="#" class="follow_btn hidden-xs">Follow</a>
            </div>
            <div class="col-md-8  col-xs-12">
                <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail picture hidden-xs" />
                <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail visible-xs picture_mob" />
                <div class="header">
                    <a href="{{ url('u/' . $currentUser->id) }}">
                        <h1> {{ $user->firstName.' '.$user->lastName }} </h1>
                    </a>
                    <h4> <i class="glyphicon glyphicon-ok"></i>  Friend </h4>
                <span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</span>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">

                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                Domains </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Messages </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Friends </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->

            </div>
            <div class="col-md-6">



            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>



@endsection