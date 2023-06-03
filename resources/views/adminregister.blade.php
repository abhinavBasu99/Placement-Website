@extends('layouts.details')

@push('mytitle')
<title>Admin Registration</title>
@endpush

@push('extraheaderlink1')
<li class="navigations"><a href="/">Home</a></li>

@endpush

@push('extraheaderlink2')
<li class="navigations"><a href="/student/studentlogin">Student<br>Login / Register</a></li>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/adminregister.css') }}">


@endpush

@section('main-section')

<main class="container">
    <div class="maindiv">
        <form action="/admin/adminregister" method="post" class="form">
            @csrf
            <h1>Admin Registration</h1><br><br>
            <div class="inputs">
                <div class="leftsideinputs">
                    <label for="a_no">Admin No.</label><br>
                    <input type="text" name="a_no" id="a_no" value="{{$no_of_admins + 1}}"><br>
                    <span class="error">
                        @error('a_no')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="email">Email Id</label><br>
                    <input type="email" name="email" id="email"><br>
                    <span class="error">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password"><br>
                    <span class="error">
                        @error('password')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="rightsideinputs">
                    <label for="confirm_password">Confirm Password</label><br>
                    <input type="password" name="confirm_password" id="confirm_password"><br>
                    <span class="error">
                        @error('confirm_password')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="admin_key">Admin Key</label><br>
                    <input type="password" name="admin_key" id="admin_key"><br>
                    <span class="error">
                        @error('admin_key')
                        {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
            <button type="submit">Register</button><br>
        </form>
        <a href="/admin/adminlogin" class="loginlink">Already have an account? Log In</a>
    </div>
</main>

@endsection
