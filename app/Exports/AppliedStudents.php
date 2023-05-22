<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Companies;
use App\Models\Companies_Student;
use Generator;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppliedStudents implements FromGenerator,ShouldAutoSize,WithStyles,WithHeadings
{
    use Exportable;

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function headings(): array
    {
        $company = Companies::find($this->id);

        return [
            $company->name_of_company." Applied Students"
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
            2    => ['font' => ['bold' => true]],
        ];
    }

    public function generator(): Generator
    {
        $appliedstudents = Companies_Student::where('company_no', $this->id)->get();
        $appliedstudents_enrollment_nos = array();
        foreach($appliedstudents as $student){
            array_push($appliedstudents_enrollment_nos, $student->enrollment_no);
        }

        $studentsdetails = Student::find($appliedstudents_enrollment_nos);

        yield['Enrollment No', 'Student Name', 'Course', 'Semester', 'Section', 'Email', 'Contact No', 'Tenth Percentage', 'Twelth Percentage', 'Graduation Percentage'];

        foreach($studentsdetails as $student){
            yield[$student->enrollment_no, $student->student_name, $student->course, $student->semester, $student->section, $student->email, $student->contact_no, $student->tenth_percentage, $student->twelth_percentage, $student->graduation_percentage];
        }
    }

}
