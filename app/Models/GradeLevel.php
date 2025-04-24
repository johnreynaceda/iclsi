<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    protected $guarded = [];

    public function teacher(){
        return $this->hasOne(Teacher::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }
}
