@extends('layouts.details')

@push('mytitle')
<title>Admin Login</title>
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
<link rel="stylesheet" href="{{ url('/css/adminlogin.css') }}">


@endpush

@section('main-section')

<main class="container">
    <div>
        <form action="/admin/adminlogin" method="post" class="form">
            @csrf
            <h1>Admin Login</h1><br><br>
            <span id="errormessage">
                @if (Session::has('failed'))
                {{Session::get('failed')}}
                @endif
            </span>
            <label for="email">Email Id</label><br>
            <input type="email" name="email" id="email"><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br><br>
            <button type="submit">Login</button><br>
            <a href="/admin/adminregister" class="registerlink">Don't have an account? Register</a>
        </form>
    </div>
</main>

@endsection
