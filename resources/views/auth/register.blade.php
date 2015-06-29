<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="register">
    {!! csrf_field() !!}

    <div>
        First Name
        <input type="text" name="firstName" value="{{ old('firstName') }}">
    </div>

    <div>
        Last Name
        <input type="text" name="lastName" value="{{ old('lastName') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
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