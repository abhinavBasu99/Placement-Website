@extends('layouts.details')

@push('mytitle')
<title>Student Login</title>
@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/studentlogin.css') }}">


@endpush

@section('main-section')

<main class="container">
    <div>
        <form action="/student/studentlogin" method="post" class="form">
            @csrf
            <h1>Student Login</h1><br><br>
            <span id="errormessage">@if (Session::has('failed'))
                {{Session::get('failed')}}
        @endif</span>
            <label for="email">Email Id</label><br>
            <input type="email" name="email" id="email"><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br><br>
            <button type="submit">Login</button><br>
            <a href="/student/studentregister" class="registerlink">Don't have an account? Register</a>
        </form>
    </div>
</main>

@endsection
