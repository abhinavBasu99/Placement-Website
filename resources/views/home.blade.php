@extends('layouts.details')

@push('mytitle')
<title>Placement Home</title>

@push('extraheaderlink1')
<li class="navigations"><a href="/student/studentlogin">Student<br>Login / Register</a></li>

@endpush

@push('extraheaderlink2')
<li class="navigations"><a href="/admin/adminlogin">Admin<br>Login / Register</a></li>

@endpush

@endpush
@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">


@endpush

@section('main-section')

<main>
    <h1>This is the Placement Website.</h1>
</main>

@endsection
