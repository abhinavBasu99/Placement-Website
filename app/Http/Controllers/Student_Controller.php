<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Companies;
use App\Models\Admin;
use App\Models\Courses;
use App\Models\Companies_Courses;
use App\Models\Companies_Student;
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
                session(
                    ['student_login_status' => true,
                     'student_enrollment_no' => $student->enrollment_no,
                    ]
                );
                return redirect('/student/studentpage');
            }
        }

        return redirect('/student/studentlogin')->with('failed', 'Email Id or Password is Wrong');
    }

    public function studentpage(Request $request){
        $enrollment_no = session('student_enrollment_no');
        $companies = Companies::all();
        $student = Student::find($enrollment_no);

        $appliedcompanies = Companies_Student::where('enrollment_no', $enrollment_no)->get();
        $eligiblecompanies = array();

        //Below Code is to determine the eligible companies for the student
        foreach($companies as $company){
            foreach($company->courses as $company_course){
                if($student->course == $company_course->course_name && $student->tenth_percentage >= $company->tenth_eligibility_percentage && $student->twelth_percentage >= $company->twelth_eligibility_percentage && $student->graduation_percentage >= $company->graduation_eligibility_percentage){

                //Below code is to determine whether student has applied to this eligible company or not
                $applied = false;
                foreach($appliedcompanies as $appliedcompany){
                    if($company->c_no == $appliedcompany->company_no){
                    $applied = true;
                    break;
                    }
                }

                //This is to input the applystatus in this company data and push it in the array
                    $company->applystatus = $applied;
                    array_push($eligiblecompanies, $company);
                }
            }
        }

        $data = compact('eligiblecompanies', 'student');

        return view('studentpage')->with($data);
    }

    public function editstudent(){
        $enrollment_no = session('student_enrollment_no');
        $student = Student::find($enrollment_no);
        $data = compact('student');
        return view('editstudent')->with($data);
    }

    public function submiteditstudent(Request $request){
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

        $enrollment_no = session('student_enrollment_no');

        $student = Student::find($enrollment_no);
        $student->student_name = $request->student_name;
        $student->email = $request->email;
        $student->contact_no = $request->contact_no;
        $student->course = $request->course;
        $student->semester = $request->semester;
        $student->section = $request->section;
        $student->tenth_percentage = $request->tenth_percentage;
        $student->twelth_percentage = $request->twelth_percentage;
        $student->save();

        return redirect('/student/studentpage');
    }

    public function deletestudent(){
        $enrollment_no = session('student_enrollment_no');

        Student::find($enrollment_no)->delete();
        return redirect('/');
    }

    public function uploadresume(Request $request){
        $request->validate(
            [
                'resume' => 'required|file|mimes:pdf',
            ]
        );

        $enrollment_no = session('student_enrollment_no');
        $student = Student::find($enrollment_no);

        $filename = $student->enrollment_no."resume.pdf";
        $request->file('resume')->storeAs('public/resumes', $filename);

        return redirect('/student/studentpage');
    }

    public function applyforcompany($id){
        $enrollment_no = session('student_enrollment_no');
        $student = Student::find($enrollment_no);
        $company = Companies::find($id);

        $company->students()->attach($student->enrollment_no);

        return redirect()->back();
    }

}
