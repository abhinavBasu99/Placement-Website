<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies_Courses extends Model
{
    use HasFactory;
    protected $table = 'companies_courses';

    protected $fillable = [
        'company_no',
        'course_id',
    ];
}
