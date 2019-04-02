<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    protected $fillable = [
        'studentsID', 
        'status',
        'password',
        'name',
        'email',
        'mobileNo',
        'address',
        'course',
        'education',
        'cgpa',
        'achievement',
        'clubociety',
        'skills',
        'resume'
    ];
}
