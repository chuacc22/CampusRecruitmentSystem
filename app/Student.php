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
        'firstName', 
        'lastName',
        'email',
        'mobileNo',
        'address',
        'education',
        'cgpa',
        'achievement',
        'clubs/society',
        'skills',
        'resume'
    ];
}
