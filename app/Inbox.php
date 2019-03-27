<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $table = "inboxMessages";

    protected $fillable = [
        'id',
        'stuID',
        'employerID',
        'letterDesc',
        'pdfFile'
    ];
}
