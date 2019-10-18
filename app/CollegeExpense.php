<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeExpense extends Model
{
    protected $fillable = ['date' , 'amount' , 'narration'];
}
