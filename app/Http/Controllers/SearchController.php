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
        $careertype = \Request::get('careertype');

        $job = Job::where('companyName', 'like', '%' .$searchjobtitle .'%' )
                    ->where('location', 'like' ,'%' .$searchjoblocation .'%' ) 
                    ->where('lookingFor', 'like', '%' .$careertype . '%') -> orderBy('companyName') -> paginate(20);
   
        return view('student.searchedResult', compact('job'));
    }
}
