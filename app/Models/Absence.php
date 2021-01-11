<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_nim', 'nim');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
