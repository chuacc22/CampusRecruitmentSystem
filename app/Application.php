<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "applications";

    protected $fillable = [
        'id',
        'jobID',
        'stuID',
        'stuAppStatus',
        'employerID',
        'empAppStatus',
        'applyDesc',
        'pdfFile'
    ];
}
