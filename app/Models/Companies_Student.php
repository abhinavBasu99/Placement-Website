<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies_Student extends Model
{
    use HasFactory;
    protected $table = 'companies_student';

    protected $fillable = [
        'company_no',
        'enrollment_no',
    ];
}
