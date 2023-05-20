<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $primaryKey = 'c_no';

    public function courses(){
        return $this->belongsToMany(Courses::class, 'companies_courses', 'company_no', 'course_id');
    }
}
