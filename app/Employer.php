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
        'name',
        'email',
        'mobileNo',
        'address',
        'companyName',
        'mouStatus',
        'profilePic'
    ];
}
