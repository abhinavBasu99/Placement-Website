@extends('layouts.details')

@push('mytitle')
<title>Add Company</title>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/addcourse.css') }}">

@endpush

@push('extraheaderlink1')
<li><a href="/statistics" class="navigations">Statistics</a></li>

@endpush

@push('extraheaderlink2')
<li><a href="/admin/allcompanies" class="navigations">Companies</a></li>

@endpush

@push('extraheaderlink3')
<li><a href="/admin/addcompany" class="navigations">Add Company</a></li>

@endpush

@push('extraheaderlink4')
<li><a href="/admin/addcourse" class="navigations">Add Course</a></li>

@endpush

@section('main-section')

<main class="container">
    <div class="div-of-form">
        <form action="/admin/addcourse" method="post" class="form">
            @csrf
            <h1>Add Course</h1>
            <div class="inputs">
                <label for="course_id">Course Id</label>
                <input type="text" name="course_id" id="course_id">
                <span class="error">
                    @error('course_id')
                    {{$message}}
                    @enderror
                </span>
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name" id="course_name">
                <span class="error">
                    @error('course_name')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="button">
                <button type="submit">Add</button>
            </div>
        </form>
    </div>

</main>

@endsection
