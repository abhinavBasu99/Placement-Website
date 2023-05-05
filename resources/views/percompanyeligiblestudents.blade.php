@extends('layouts.details')

@push('mytitle')
<title>All Companies</title>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/percompanyeligiblestudents.css') }}">

@endpush

@push('extraheaderlink1')
<li><a href="/statistics" class="navigations">Statistics</a></li>

@endpush

@push('extraheaderlink2')
<li><a href="/addcompany" class="navigations">Add Company</a></li>

@endpush

@push('extraheaderlink3')
<li><a href="/allcompanies" class="navigations">Companies</a></li>

@endpush

@section('main-section')

<main class="container">
    <div id="divofstudentstable">
        <h1>{{$company->name_of_company}}</h1>
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
                @foreach ($eligiblestudents as $student)

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
