<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $jobs = Job::latest()->paginate(2); // 10 jobs per page

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        Job::create($request->all());

        return redirect()->route("adminjobs.index")->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $job= Job::find($id);
         return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
        
        $job->update($request->all());
        return redirect()->route("adminjobs.index")->with('success', 'Job updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
          $job=Job::find($id);
          $job->delete();
         return redirect()->route("adminjobs.index")->with('success', 'Job deleted.');
    }

    public function showApplicants(Job $job)
{
    $applicants = $job->applicants()->latest()->get(); // Assuming relationship is defined
    return view('admin.jobs.applicants', compact('job', 'applicants'));
}

public function indexJob()
{
    $jobs = Job::latest()->get();
    return view('home', compact('jobs'));
}



}
