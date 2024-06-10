<?php

namespace App\Http\Controllers;

use App\Models\Assignments;
use App\Models\JobCard;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $assignments = Assignments::where("user_id", auth()->user()->id)->get();
        $jobCards = JobCard::where("creator", auth()->user()->id)->get();
        return view("job_cards.index", compact('assignments', 'jobCards'));
    }
}
