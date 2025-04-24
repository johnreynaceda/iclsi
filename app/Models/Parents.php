<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $guarded = [];

   public function students(){
    return $this->hasMany(Student::class, 'student_id');
   }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
