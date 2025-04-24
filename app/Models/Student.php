<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function gradeLevel(){
        return $this->belongsTo(GradeLevel::class);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }

    public function parent(){
        return $this->belongsTo(Parents::class);
    }
}
