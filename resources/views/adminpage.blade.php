@extends('layouts.details')

@push('mytitle')
<title>Admin Page</title>

@endpush

@push('extraheaderlink1')
<li class="navigations"><a href="/admin/allcompanies">Companies</a></li>

@endpush

@push('extraheaderlink2')
<li class="navigations"><a href="/admin/addcompany">Add Company</a></li>

@endpush

@push('extraheaderlink3')
<li class="navigations"><a href="/admin/addcourse">Add Course</a></li>

@endpush

@push('extraheaderlink4')
<li  class="navigations"><a href="/"><button id="logoutbutton">Log Out</button></a></li>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/adminpage.css') }}">

@endpush

@section('main-section')

<main>
    <div class="studenttablecontainer">
        <button><select name="sort" id="sort">
            <option value="sortbyname">Sort by Name</option>
            <option value="sortbysemester">Sort by Semester</option>
            <option value="sortbysection">Sort by Section</option>
        </select></button>
        <button><select name="filter" id="filter">
            <option value="filterbycourse">Filter by Course</option>
            <option value="filterbysemester">Filter by Semester</option>
            <option value="filterbysection">Filter by Section</option>
        </select></button>
        <table class="studenttable">
            <tr>
                <th>Enrollment No.</th>
                <th>Name Of Student</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Section</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Resume</th>
            </tr>

            @foreach ($students as $student)
            <tr>
                <td>{{$student->enrollment_no}}</td>
                <td><a href="/student/studentpage/{{$student->enrollment_no}}">{{$student->student_name}}</a></td>
                <td>{{$student->course}}</td>
                <td>{{$student->semester}}</td>
                <td>{{$student->section}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->contact_no}}</td>
                <td>
                    <a href="{{url('/downloadresume')."/".$student->enrollment_no}}"><button id="downloadresumebutton">Download</button></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</main>

@endsection
