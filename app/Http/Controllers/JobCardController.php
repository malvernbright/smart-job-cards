<?php

namespace App\Http\Controllers;

use App\Models\JobCard\JobCard;
use Illuminate\Http\Request;

class JobCardController extends Controller
{
    public function index()
    {
        $job_cards = JobCard::all();
        return view("job_cards.index", compact('job_cards'));
    }
}
