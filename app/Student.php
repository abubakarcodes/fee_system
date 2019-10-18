<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;
use App\Fee;

class Student extends Model
{
    protected $fillable = ['date' , 'name' , 'picture' , 'gender' ,'cnic' , 'father_name' , 'contact' , 'father_contact' , 'birth_date' , 'email' , 'address' , 'expertise' , 'referral', 'courses'];


    public function course_s(){
    	return $this->belongsToMany(Course::class , 'fees' , 'student_id' , 'course_id');
    }
    public function fees(){
    	return $this->hasMany(Fee::class , 'student_id');
    }

}
