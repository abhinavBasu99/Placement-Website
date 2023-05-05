@extends('layouts.details')

@push('mytitle')
<title>Edit Company</title>

@endpush

@push('mycss')
<link rel="stylesheet" href="{{ url('/css/main.css') }}">

@endpush

@push('mycss2')
<link rel="stylesheet" href="{{ url('/css/editcompany.css') }}">

@endpush

@push('extraheaderlink1')
<li><a href="/statistics" class="navigations">Statistics</a></li>

@endpush

@push('extraheaderlink2')
<li><a href="/addcompany" class="navigations">Add Company</a></li>

@endpush

@section('main-section')
<main class="container">
    <div class="div-of-form">
        <form action="{{url('/editcompany')."/".$company->c_no}}" method="post" class="form">
            @csrf
            <h1>Edit Company Details</h1>
            <div class="inputs">
                <div class="leftsideinputs">
                    <label for="name_of_company">Name Of Company</label>
                    <input type="text" name="name_of_company" id="name_of_company" value="{{$company->name_of_company}}">
                    <span class="error">
                        @error('name_of_company')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" value="{{$company->website}}">
                    <span class="error">
                        @error('website')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="package">Package (in lacks)</label>
                    <input type="text" name="package" id="package" value="{{$company->package}}">
                    <span class="error">
                        @error('package')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="rightsideinputs">
                    <label for="tenth_eligibility_percentage">10th Eligibility Percentage</label>
                    <input type="text" name="tenth_eligibility_percentage" id="tenth_eligibility_percentage" value="{{$company->tenth_eligibility_percentage}}">
                    <span class="error">
                        @error('tenth_eligibility_percentage')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="twelth_eligibility_percentage">12th Eligibility Percentage</label>
                    <input type="text" name="twelth_eligibility_percentage" id="twelth_eligibility_percentage" value="{{$company->twelth_eligibility_percentage}}">
                    <span class="error">
                        @error('twelth_eligibility_percentage')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="graduation_eligibility_percentage">Graduation Eligibility Percentage</label>
                    <input type="text" name="graduation_eligibility_percentage" id="graduation_eligibility_percentage" value="{{$company->graduation_eligibility_percentage}}">
                    <span class="error">
                        @error('graduation_eligibility_percentage')
                        {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="button">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</main>

@endsection
