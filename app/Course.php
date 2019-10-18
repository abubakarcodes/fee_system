<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Fee;
class Course extends Model
{
   protected $fillable = ['name'];


   public function students(){

    	return $this->belongsToMany(Student::class, 'fees' , 'course_id' , 'student_id');
   		
   }



   public function fees()
   {
   		return $this->hasMany(Fee::class , 'course_id');
   }


}
