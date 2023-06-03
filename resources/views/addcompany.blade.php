@extends('layouts.details')

@push('mytitle')
<title>Add Company</title>

@endpush

@push('extraheaderlink1')
<li class="navigations"><a href="/admin/adminpage">Students</a></li>

@endpush

@push('extraheaderlink2')
<li class="navigations"><a href="/admin/allcompanies">Companies</a></li>

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
<link rel="stylesheet" href="{{ url('/css/addcompany.css') }}">

@endpush

@section('main-section')
<main class="container">
    <div class="div-of-form">
        <form action="/admin/addcompany" method="post" class="form">
            @csrf
            <h1>Add Company</h1>
            <div class="inputs">
                <div class="leftsideinputs">
                    <label for="c_no">Company Number</label>
                    <input type="text" name="c_no" id="c_no" value="{{$no_of_companies + 1}}">
                    <span class="error">
                        @error('c_no')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="name_of_company">Name Of Company</label>
                    <input type="text" name="name_of_company" id="name_of_company" value="{{old('name_of_company')}}">
                    <span class="error">
                        @error('name_of_company')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" value="{{old('website')}}">
                    <span class="error">
                        @error('website')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="package">Package (in lacks)</label>
                    <input type="text" name="package" id="package" value="{{old('package')}}">
                    <span class="error">
                        @error('package')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="rightsideinputs">
                    <label for="tenth_eligibility_percentage">10th Eligibility Percentage</label>
                    <input type="text" name="tenth_eligibility_percentage" id="tenth_eligibility_percentage" value="{{old('tenth_eligibility_percentage')}}">
                    <span class="error">
                        @error('tenth_eligibility_percentage')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="twelth_eligibility_percentage">12th Eligibility Percentage</label>
                    <input type="text" name="twelth_eligibility_percentage" id="twelth_eligibility_percentage" value="{{old('twelth_eligibility_percentage')}}">
                    <span class="error">
                        @error('twelth_eligibility_percentage')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="graduation_eligibility_percentage">Graduation Eligibility Percentage</label>
                    <input type="text" name="graduation_eligibility_percentage" id="graduation_eligibility_percentage" value="{{old('graduation_eligibility_percentage')}}">
                    <span class="error">
                        @error('graduation_eligibility_percentage')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="number_of_eligible_courses">No. of Eligible Courses</label>
                    <input type="number" name="number_of_eligible_courses" id="number_of_eligible_courses">
                    <span class="error">
                        @error('number_of_eligible_courses')
                        {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="button">
                <button type="submit" id="addbutton">Add</button>
            </div>
        </form>
    </div>
</main>

@endsection
