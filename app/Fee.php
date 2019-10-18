<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Course;

class Fee extends Model
{
    protected $fillable = ['student_id' , 'course_id' , 'total_fee' , 'discount' , 'discounted_fee' , 'total_net_fee' , 'fee_paid' , 'remaining_fee'];


	public function student(){
		return $this->belongsTo(Student::class);
	}


	public function course(){
		return $this->belongsTo(Course::class);
	}

    
}
