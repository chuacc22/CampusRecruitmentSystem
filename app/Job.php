<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "jobs";

    protected $fillable = [
        'id',
        'companyName',
        'companyWeb', 
        'companyRegNo', 
        'jobDesc',
        'Requirement',
        'lookingFor',
        'companyOverview',
        'companySnapshot',
        'location',
        'contactUs'
    ];
}
