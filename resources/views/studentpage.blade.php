@extends('layouts.details')

@push('mytitle')
<title>Your Page</title>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/studentpage.css') }}">

@endpush

@section('main-section')

<main class="container">
    <div class="studentdetails">
        <img src="/images/profileImage.png" alt="Your Photo" id="yourimage">
        <h1>{{$student->student_name}}</h1>
        <ul id="details">
            <li>Enrollment No.:- {{$student->enrollment_no}}</li>
            <li>Course:- {{$student->course}}</li>
            <li>Semester:- {{$student->semester}}</li>
            <li>Section:- {{$student->section}}</li>
            <li>Email Id:- {{$student->email}}</li>
            <li>Contact No.:- {{$student->contact_no}}</li>
        </ul>
        <a href="{{url('/editstudent')."/".$student->enrollment_no}}"><button id="editbutton">Edit Your Details</button></a>
        <div id="resume">
            <form action="/downloadresume" method="post" id="downloadresumeform">
                @csrf
                <span>Resume:</span>
                <button id="downloadresumebutton">Download</button>
                <label for="hiddenid2"></label>
                <input type="text" name="hiddenid2" class="hidden" id="hiddenid" value={{$student->enrollment_no}}>
            </form>
            <form action="/uploadresume" method="post" enctype="multipart/form-data" id="uploadresumeform">
                @csrf
                <label for="resume">Change Resume:</label>
                <input type="file" name="resume" id="resume">
                <button type="submit" id="uploadresumebutton">Upload</button>
                <label for="hiddenid"></label>
                <input type="text" name="hiddenid" class="hidden" id="hiddenid" value={{$student->enrollment_no}}>
            </form>
        </div>
    </div>
    <div class="companies">
        <table class="companiestable">
            <tr>
                <th>C No.</th>
                <th>Name Of Company</th>
                <th>Website</th>
                <th>Package (in lacks)</th>
                <th>Eligibility</th>
                <th>Apply / Reject</th>
            </tr>
            @foreach ($companies as $company)
            <tr>
                <td>{{$company->c_no}}</td>
                <td>{{$company->name_of_company}}</td>
                <td><a href="">{{$company->website}}</a></td>
                <td>{{$company->package}}</td>
                <td>@if ($eligiblecompanies[($company->c_no)-1])
                         Eligible
                         @else
                         Not Eligible
                @endif
                <td><a href=""><button id="applybutton">Apply</button></a><a href=""><button id="rejectbutton">Reject</button></a></td>
            </tr>
            @endforeach
        </table>
    </div>
</main>

@endsection
