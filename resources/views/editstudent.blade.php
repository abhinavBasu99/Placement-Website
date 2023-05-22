@extends('layouts.details')

@push('mytitle')
<title>Edit Student Details</title>

@endpush

@push('extraheaderlink1')
<li class="navigations"><a href="/student/studentpage">My Page</a></li>

@endpush

@push('extraheaderlink2')
<li class="navigations"><a href="/"><button id="logoutbutton">Log Out</button></a></li>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/editstudent.css') }}">


@endpush

@section('main-section')

<main class="container">
    <div class="div-of-form">
        <form action="/student/editstudent" method="post" class="form">
            @csrf
            <h1>Edit Student Details</h1>
            <div class="inputs">
                <div class="leftsideinputs">
                    <label for="student_name">Name</label>
                    <input type="text" name="student_name" id="student_name" value="{{$student->student_name}}">
                    <span class="error">
                        @error('student_name')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{$student->email}}">
                    <span class="error">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="contact_no">Contact No.</label>
                    <input type="text" name="contact_no" id="contact_no" value="{{$student->contact_no}}">
                    <span class="error">
                        @error('contact_no')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="middleinputs">
                    <label for="course">Course</label>
                    <select name="course" id="course">
                        <option value="btech">B Tech</option>
                        <option value="mtech">M Tech</option>
                        <option value="bca">BCA</option>
                        <option value="mca">MCA</option>
                        <option value="bba">BBA</option>
                        <option value="mba">MBA</option>
                    </select>
                    <label for="semester">Semester</label>
                    <input type="text" name="semester" id="semester" value="{{$student->semester}}">
                    <span class="error">
                        @error('semester')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="section">Section</label>
                    <input type="text" name="section" id="section" value="{{$student->section}}">
                    <span class="error">
                        @error('section')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="rightsideinputs">
                    <label for="tenth_percentage">10th Percentage</label>
                    <input type="text" name="tenth_percentage" id="tenth_percentage" value="{{$student->tenth_percentage}}">
                    <span class="error">
                        @error('tenth_percentage')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="twelth_percentage">12th Percentage</label>
                    <input type="text" name="twelth_percentage" id="twelth_percentage" value="{{$student->twelth_percentage}}">
                    <span class="error">
                        @error('twelth_percentage')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="graduation_percentage">Graduation Percentage</label>
                    <input type="text" name="graduation_percentage" id="graduation_percentage" value="{{$student->graduation_percentage}}">
                    <span class="error">
                        @error('graduation_percentage')
                        {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="button">
                <button type="submit" id="updatebutton">Update</button>
            </div>
        </form>
    </div>
</main>

@endsection
