<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Companies;
use Generator;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EligibleStudents implements FromGenerator,ShouldAutoSize,WithStyles,WithHeadings
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
            $company->name_of_company." Eligible Students"
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
        $company = Companies::find($this->id);
        $students = Student::all();
        $eligiblestudents = array();

        foreach($students as $student){
            if($student->tenth_percentage >= $company->tenth_eligibility_percentage && $student->twelth_percentage >= $company->twelth_eligibility_percentage && $student->graduation_percentage >= $company->graduation_eligibility_percentage){
                array_push($eligiblestudents, $student);
            }
        }

        yield['Enrollment No', 'Student Name', 'Course', 'Semester', 'Section', 'Email', 'Contact No', 'Tenth Percentage', 'Twelth Percentage', 'Graduation Percentage'];

        foreach($eligiblestudents as $student){
            yield[$student->enrollment_no, $student->student_name, $student->course, $student->semester, $student->section, $student->email, $student->contact_no, $student->tenth_percentage, $student->twelth_percentage, $student->graduation_percentage];
        }
    }

}
