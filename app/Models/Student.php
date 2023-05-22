<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $primaryKey = 'enrollment_no';

    public function companies(){
        return $this->belongsToMany(Companies::class, 'companies_student', 'company_no', 'enrollment_no');
    }
}
