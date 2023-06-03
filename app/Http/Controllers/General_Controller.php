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
use Illuminate\Support\Facades\File;

class General_Controller extends Controller{
    public function home(){
        session()->flush();
        return view('home');
    }

    public function downloadresume($id){

        $filename = $id.'resume.pdf';
        $filepath = storage_path('app/public/resumes/'.$filename);
        $filepresent = false;

        if(File::exists($filepath)){
            $filepresent = true;
        }
        else{
            echo "File not present";
        }
        // return response()->download($filepath);
    }
}
?>
