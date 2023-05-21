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

class General_Controller extends Controller{
    public function home(){
        session()->flush();
        return view('home');
    }

    public function downloadresume($id){

        $filename = $id.'resume.pdf';
        $filepath = storage_path('app/public/resumes/'.$filename);

        return response()->download($filepath);
    }
}
?>
