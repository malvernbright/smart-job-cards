<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCard;
use App\Models\User;
use Illuminate\Http\Request;

class JobCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.job_cards.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "title" => "required",
            "description" => "required",
            "requirements" => "required",
            "status" => "required"
        ]);
        
          $jobCard = new JobCard();
          $jobCard->title = $request->get('title');
          $jobCard->description = $request->get('description');
          $jobCard->requirements = $request->get('requirements');
          $jobCard->creator = auth()->user()->id;
          $jobCard->status = $request->get('status');
          $jobCard->save();
          
          return to_route('admin.index')->with('message', 'Job Card created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobCard = JobCard::findOrFail($id);
        return view("admin.job_cards.show", compact("jobCard"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
