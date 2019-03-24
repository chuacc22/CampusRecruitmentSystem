<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = "employers";

    protected $fillable = [
        'id', 
        'status',
        'password',
        'firstName', 
        'lastName',
        'email',
        'mobileNo',
        'address',
        'companyName'
    ];
}
