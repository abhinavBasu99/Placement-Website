@extends('layouts.details')

@push('mytitle')
<title>Select Eligible Branches</title>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/selectcourses.css') }}">

@endpush

@push('extraheaderlink1')
<li><a href="/statistics" class="navigations">Statistics</a></li>

@endpush

@push('extraheaderlink2')
<li><a href="/allcompanies" class="navigations">Companies</a></li>

@endpush

@push('extraheaderlink3')
<li><a href="/addcompany" class="navigations">Add Company</a></li>

@endpush

@push('extraheaderlink4')
<li><a href="/addcourse" class="navigations">Add Course</a></li>

@endpush

@section('main-section')

@php
    $add_company_data = session('add_company_data');
    $numberofeligiblecourses = $add_company_data['number_of_eligible_courses'];
@endphp

<main class="container">
    <div class="div-of-form">
        <form action="/selectcourses" method="post" class="form">
            @csrf
            <h1>Select Eligible Branches</h1>
            <div class="inputs">
                @for($i = 1; $i <= $numberofeligiblecourses; $i++)
                <label for="">Select Course {{$i}}</label>
                <select name="course[]" id="{{'course'.$i}}">
                    @foreach ($courses as $course)
                    <option value="{{$course->course_id}}">{{$course->course_name}}</option>

                    @endforeach
                </select>
                @endfor
            </div>
            <input type="hidden" name="add_company_data" value="{{json_encode($add_company_data)}}">
            <div class="button">
                <button type="submit">Add Company</button>
            </div>
        </form>
    </div>
</main>

@endsection
