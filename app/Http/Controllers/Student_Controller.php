<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Companies;
use App\Models\Admin;
use App\Models\Courses;
use App\Models\Companies_Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Exports\EligibleStudents;
use Maatwebsite\Excel\Facades\Excel;

class Student_Controller extends Controller
{
    public function studentregister(){
        return view('studentregister');
    }

    public function submitstudentregister(Request $request){
        $request->validate(
            [
                'enrollment_no' => 'required|numeric|unique:student,enrollment_no',
                'student_name' => 'required|string',
                'email' => 'required|email',
                'contact_no' => 'required|numeric|max_digits:10',
                'semester' => 'required|numeric|max_digits:1',
                'section' => 'required|string|uppercase|max:1',
                'tenth_percentage' => 'required|numeric|between:1, 100',
                'twelth_percentage' => 'required|numeric|between:1, 100',
                'graduation_percentage' => 'required|numeric|between:1, 100',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]
            );

        $student = new Student();
        $student->enrollment_no = $request->enrollment_no;
        $student->student_name = $request->student_name;
        $student->email = $request->email;
        $student->contact_no = $request->contact_no;
        $student->course = $request->course;
        $student->semester = $request->semester;
        $student->section = $request->section;
        $student->tenth_percentage = $request->tenth_percentage;
        $student->twelth_percentage = $request->twelth_percentage;
        $student->graduation_percentage = $request->graduation_percentage;
        $student->password = Hash::make($request->password);
        $student->save();

        return redirect('/student/studentlogin');
    }

    public function studentlogin(){
        return view('studentlogin');
    }

    public function studentauthentication(Request $request){
        $students = Student::all();
        foreach ($students as $student) {
            if($request->email == $student->email && Hash::check($request->password, $student->password)){
                return redirect()->route('studentpage', ['id' => $student])->with('success', 'You have logged in successfully.');
            }
        }

        return redirect('/student/studentlogin')->with('failed', 'Email Id or Password is Wrong');
    }

    public function studentpage(Request $request){
        $value = request()->input('id');
        $companies = Companies::all();
        $student = Student::find($value);

        $eligiblecompanies = array();
        foreach($companies as $company){
            foreach($company->courses as $company_course){
                if($student->course == $company_course->course_name && $student->tenth_percentage >= $company->tenth_eligibility_percentage && $student->twelth_percentage >= $company->twelth_eligibility_percentage && $student->graduation_percentage >= $company->graduation_eligibility_percentage){
                    array_push($eligiblecompanies, $company);
                }
            }
        }


        $data = compact('eligiblecompanies', 'student');

        return view('studentpage')->with($data);
    }

    public function editstudent($id){
        $student = Student::find($id);
        $data = compact('student');
        return view('editstudent')->with($data);
    }

    public function submiteditstudent(Request $request, $id){
        $request->validate(
            [
                'student_name' => 'required|string',
                'email' => 'required|email',
                'contact_no' => 'required|numeric|max_digits:10',
                'semester' => 'required|numeric|max_digits:1',
                'section' => 'required|string|uppercase|max:1',
                'tenth_percentage' => 'required|numeric|between:1, 100',
                'twelth_percentage' => 'required|numeric|between:1, 100',
                'graduation_percentage' => 'required|numeric|between:1, 100',
            ]
            );

        $student = Student::find($id);
        $student->student_name = $request->student_name;
        $student->email = $request->email;
        $student->contact_no = $request->contact_no;
        $student->course = $request->course;
        $student->semester = $request->semester;
        $student->section = $request->section;
        $student->tenth_percentage = $request->tenth_percentage;
        $student->twelth_percentage = $request->twelth_percentage;
        $student->save();

        return redirect()->back();
    }

    public function deletestudent($id){
        Student::find($id)->delete();
        return redirect('/student/studentlogin');
    }

    public function uploadresume(Request $request){
        $request->validate(
            [
                'resume' => 'file|mimes:pdf',
            ]
        );

        $value = $request->hiddenid;
        $student = Student::find($value);

        $filename = $student->enrollment_no."resume.pdf";
        $request->file('resume')->storeAs('public/resumes', $filename);

        return redirect()->route('studentpage', ['id' => $student]);
    }
}
