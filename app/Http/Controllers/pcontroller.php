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

class pcontroller extends Controller{
    public function eligibility($tenthper, $twelthper, $gradper){
        $companies = Companies::all();
    }

    public function home(){
        return view('home');
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

        return redirect('/studentlogin')->with('failed', 'Email Id or Password is Wrong');
    }

    public function studentregister(){
        return view('studentregister');
    }

    public function adminlogin(){
        return view('adminlogin');
    }

    public function adminauthentication(Request $request){
        $admins = Admin::all();
        foreach ($admins as $admin) {
            if($request->email == $admin->email && Hash::check($request->password, $admin->password)){
                return redirect('/adminpage')->with('success', 'You have logged in successfully.');
            }
        }

        return redirect('/adminlogin')->with('failed', 'Email Id or Password is Wrong');
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

        return redirect('/studentlogin');
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

        return redirect('/adminlogin');
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

    public function addcompany(){
        $url = url('/addcompany');
        $title = 'Add Company';
        $buttontext = 'Add';
        $data = compact('url', 'title', 'buttontext');
        return view('addcompany')->with($data);
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

            return redirect('/selectcourses')->with('add_company_data', $add_company_data);
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

            return redirect('/allcompanies');
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

        return redirect('/allcompanies');

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

    public function downloadresume($id){

        $filename = $id.'resume.pdf';
        $filepath = storage_path('app/public/resumes/'.$filename);

        return response()->download($filepath);
    }

    public function deletecompany($id){
        Companies::find($id)->delete();
        return redirect()->back();
    }

    public function deletestudent($id){
        Student::find($id)->delete();
        return redirect()->back();
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

    public function downloadexcel($id){
        $company = Companies::find($id);

        return (new EligibleStudents($id))->download($company->name_of_company." Eligible Students.xlsx");
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

        return redirect('/addcourse');
    }

}
?>
