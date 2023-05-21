@extends('layouts.details')

@push('mytitle')
<title>All Companies</title>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/allcompanies.css') }}">

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
    <div id="divofcompanytable">
        <table id="companytable">
            <thead>
                <th>C No.</th>
                <th>Name Of Company</th>
                <th>Website</th>
                <th>Package (in lacks)</th>
                <th>10th Eligibility Percentage</th>
                <th>12th Eligibility Percentage</th>
                <th>Graduation Eligibility Percentage</th>
                <th>Edit / Delete</th>
            </thead>
            <tbody>
                @foreach ($companies as $company)

                <tr>
                    <td>{{$company->c_no}}</td>
                    <td><a href="{{url('/admin/percompanyeligiblestudents')."/".$company->c_no}}">{{$company->name_of_company}}</a></td>
                    <td><a href="">{{$company->website}}</a></td>
                    <td>{{$company->package}}</td>
                    <td>{{$company->tenth_eligibility_percentage}}</td>
                    <td>{{$company->twelth_eligibility_percentage}}</td>
                    <td>{{$company->graduation_eligibility_percentage}}</td>
                    <td><a href="{{url('/admin/editcompany')."/".$company->c_no}}"><button id="editbutton">Edit</button></a><a href="{{url('/admin/deletecompany')."/".$company->c_no}}"><button id="deletebutton">Delete</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection
