<html>
<head>

</head>
<body>
<form action="" method="post">
    {!! csrf_field() !!}

    About Me: <input type="text" name="aboutMe" value="{{ $profile->aboutMe }}"/> <br/>
    Relationship Status: <input type="text" name="RelationshipStatus" value="{{ $profile->RelationshipStatus }}"/> <br/>
    Number: <input type="text" name="contactNumber" value="{{ $profile->contactNumber }}"/> <br/>
    city: <input type="text" name="city" value="{{ $profile->city }}"/> <br/>
    country: <input type="text" name="country" value="{{ $profile->country }}"/> <br/>
    <input type="submit"/>

</form>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>