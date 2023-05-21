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

@push('javascript')
<script src="{{url('/js/studentpage.js')}}"></script>

@endpush

@section('main-section')
<span id="successmessage">
    @if (Session::has('success'))
    {{Session::get('success')}}
    @endif
</span>
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
        <div class="profileoptions">
        <a href="{{url('/student/editstudent')."/".$student->enrollment_no}}"><button id="editbutton">Edit Your Details</button></a>
        <a href="{{url('/student/deletestudent')."/".$student->enrollment_no}}"><button id="deletebutton">Delete Profile</button></a>
        </div>
        <div id="resume">
            <span>Resume:</span>
            <a href="{{url('/downloadresume')."/".$student->enrollment_no}}"><button id="downloadresumebutton">Download</button></a>
            <form action="/student/uploadresume" method="post" enctype="multipart/form-data" id="uploadresumeform">
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
                <th>Apply / Reject</th>
            </tr>
            @foreach ($eligiblecompanies as $company)
            <tr>
                <td>{{$company->c_no}}</td>
                <td>{{$company->name_of_company}}</td>
                <td><a href="">{{$company->website}}</a></td>
                <td>{{$company->package}}</td>
                <td class="applystatuses" id="{{'applystatus'.$company->c_no}}">
                    <a href=""><button class="applybuttons" id="{{'applybutton'.$company->c_no}}">Apply</button></a><a href=""><button class="rejectbuttons" id="{{'rejectbutton'.$company->c_no}}">Reject</button></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</main>

@endsection
