@extends('layouts.details')

@push('mytitle')
<title>Applied Students</title>

@endpush

@push('extraheaderlink1')
<li class="navigations"><a href="/admin/adminpage">Students</a></li>

@endpush

@push('extraheaderlink2')
<li class="navigations"><a href="/admin/allcompanies">Companies</a></li>

@endpush

@push('extraheaderlink3')
<li class="navigations"><a href="/admin/addcompany">Add Company</a></li>

@endpush

@push('extraheaderlink4')
<li class="navigations"><a href="/admin/addcourse">Add Course</a></li>

@endpush

@push('extraheaderlink5')
<li  class="navigations"><a href="/"><button id="logoutbutton">Log Out</button></a></li>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/percompanyappliedstudents.css') }}">

@endpush

@section('main-section')

<main class="container">
    <div id="divofstudentstable">
        <h1>{{$company->name_of_company}} Applied Students</h1>
        <div><a href="/admin/percompanyappliedstudents/downloadexcel/{{$company->c_no}}"><button id="downloadexcelbutton">Download as Excel</button></a></div>
        <table id="studentstable">
            <thead>
                <th>Enrollment No</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Section</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>10th Percentage</th>
                <th>12th Percentage</th>
                <th>Graduation Percentage</th>
            </thead>
            <tbody>
                @foreach ($studentsdetails as $student)

                <tr>
                    <td>{{$student->enrollment_no}}</td>
                    <td>{{$student->student_name}}</td>
                    <td>{{$student->course}}</td>
                    <td>{{$student->semester}}</td>
                    <td>{{$student->section}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->contact_no}}</td>
                    <td>{{$student->tenth_percentage}}</td>
                    <td>{{$student->twelth_percentage}}</td>
                    <td>{{$student->graduation_percentage}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection
