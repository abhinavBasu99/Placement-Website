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

class Admin_Controller extends Controller
{
    public function adminregister(){
        return view('adminregister');
    }

    public function submitadminregister(Request $request){
        $request->validate(
            [
                'a_no' => 'required|numeric|unique:admin,a_no',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'admin_key' => 'required|in:959595'
            ]
            );

        $admin = new Admin();
        $admin->a_no = $request->a_no;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect('/admin/adminlogin');
    }

    public function adminlogin(){
        return view('adminlogin');
    }

    public function adminauthentication(Request $request){
        $admins = Admin::all();
        foreach ($admins as $admin) {
            if($request->email == $admin->email && Hash::check($request->password, $admin->password)){
                session()->put('admin_login_status', true);
                return redirect('/admin/adminpage');
            }
        }

        return redirect('/admin/adminlogin')->with('failed', 'Email Id or Password is Wrong');
    }

    public function adminpage(){
        $students = Student::all();
        $data = compact('students');

        return view('adminpage')->with($data);
    }

    public function allcompanies(){
        $companies = Companies::all();
        $data = compact('companies');

        return view('allcompanies')->with($data);
    }

    public function percompanyeligiblestudents($id){
        $company = Companies::find($id);
        $students = Student::all();
        $eligiblestudents = array();

        foreach($students as $student){
            foreach($company->courses as $company_course){
                if($student->course == $company_course->course_name && $student->tenth_percentage >= $company->tenth_eligibility_percentage && $student->twelth_percentage >= $company->twelth_eligibility_percentage && $student->graduation_percentage >= $company->graduation_eligibility_percentage){
                    array_push($eligiblestudents, $student);
                }
            }
        }

        $data = compact('company', 'eligiblestudents');

        return view('percompanyeligiblestudents')->with($data);
    }

    public function addcompany(){
        return view('addcompany');
    }


    public function submitaddcompany(Request $request){
        $courses = Courses::all();

        $request->validate(
            [
                'c_no' => 'required|numeric|unique:companies,c_no',
                'name_of_company' => 'required',
                'website' => 'required',
                'package' => 'required|numeric',
                'tenth_eligibility_percentage' => 'required|numeric|between:1, 100',
                'twelth_eligibility_percentage' => 'required|numeric|between:1, 100',
                'graduation_eligibility_percentage' => 'required|numeric|between:1, 100',
                'number_of_eligible_courses' => 'required|numeric|max:'.count($courses),
                ]
            );

            $add_company_data = $request->all();

            return redirect('/admin/addcompany/selectcourses')->with('add_company_data', $add_company_data);
        }

    public function selectcourses(){
            $courses = Courses::all();
            $data = compact('courses');

            return view('selectcourses')->with($data);
        }

    public function submitselectcourses(Request $request){
            $company_data = json_decode($request->add_company_data);

            $company = new Companies();
            $company->c_no = $company_data->c_no;
            $company->name_of_company = $company_data->name_of_company;
            $company->website = $company_data->website;
            $company->package = $company_data->package;
            $company->tenth_eligibility_percentage = $company_data->tenth_eligibility_percentage;
            $company->twelth_eligibility_percentage = $company_data->twelth_eligibility_percentage;
            $company->graduation_eligibility_percentage = $company_data->graduation_eligibility_percentage;
            $company->save();

            $currentcompany = Companies::find($company_data->c_no);
            $courses =  $request->course;
            $currentcompany->courses()->attach($courses);

            return redirect('/admin/allcompanies');
        }

    public function editcompany($id){
            $company = Companies::find($id);
            $data = compact('company');
            return view('editcompany')->with($data);
        }

    public function submiteditcompany(Request $request, $id){
        $request->validate(
            [
                'name_of_company' => 'required',
                'website' => 'required',
                'package' => 'required|numeric',
                'tenth_eligibility_percentage' => 'required|numeric|between:1, 100',
                'twelth_eligibility_percentage' => 'required|numeric|between:1, 100',
                'graduation_eligibility_percentage' => 'required|numeric|between:1, 100',
            ]
        );

        $company = Companies::find($id);
        $company->name_of_company = $request->name_of_company;
        $company->website = $request->website;
        $company->package = $request->package;
        $company->tenth_eligibility_percentage = $request->tenth_eligibility_percentage;
        $company->twelth_eligibility_percentage = $request->twelth_eligibility_percentage;
        $company->graduation_eligibility_percentage = $request->graduation_eligibility_percentage;
        $company->save();

        return redirect('/admin/allcompanies');

    }

    public function deletecompany($id){
        Companies::find($id)->delete();
        return redirect()->back();
    }

    public function addcourse(){
        return view('addcourse');
    }

    public function submitaddcourse(Request $request){
        $request->validate(
            [
                'course_id' => 'required|numeric|unique:courses,course_id',
                'course_name' => 'required'
            ]
            );

        $course = new Courses();
        $course->course_id = $request->course_id;
        $course->course_name = $request->course_name;
        $course->save();

        return redirect('/admin/addcourse');
    }

    public function downloadexcel($id){
        $company = Companies::find($id);

        return (new EligibleStudents($id))->download($company->name_of_company." Eligible Students.xlsx");
    }
}
