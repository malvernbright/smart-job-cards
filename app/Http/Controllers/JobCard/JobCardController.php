<?php

namespace App\Http\Controllers\JobCard;

use App\Http\Controllers\Controller;
use App\Models\Assignments;
use App\Models\JobCard;
use App\Models\User;
use Illuminate\Http\Request;

class JobCardController extends Controller
{
    public function index()
    {
        // $job_cards = JobCard::where("creator", auth()->user()->id)->get();
        $assignments = Assignments::where("user_id", auth()->user()->id)->get();
        return view("job_cards.index", compact('assignments'));
    }
}
