<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "jobs";

    protected $fillable = [
        'id',
        'title',
        'companyName',
        'companyWeb', 
        'companyRegNo', 
        'jobDesc',
        'requirement',
        'lookingFor',
        'companyOverview',
        'companySnapshot',
        'address' ,
        'district' ,
        'state' ,
        'contactUs' ,
        'companyLogo',
        'employerID'
    ];
}
