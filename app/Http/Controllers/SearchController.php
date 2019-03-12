<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App\Job;

class SearchController extends Controller
{
    //
    public function search()
    {
        $searchjobtitle = \Request::get('searchjobtitle');
        $searchjoblocation = \Request::get('searchjoblocation');


        $job = Job::where('companyName', 'like', '%' .$searchjobtitle .'%' ,'and', 'location', 'like' ,'%' .$searchjoblocation .'%' ) ->orderBy('companyName') -> paginate(20);
   
        return view('searchedResult', compact('job'));
    }
}
