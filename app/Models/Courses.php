<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'course_id';

    public function companies(){
        return $this->belongsToMany(Companies::class, 'companies_courses', 'company_no', 'course_id');
    }
}
