<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    //
    public function showForm($jobId)
    {
        $job = Job::findOrFail($jobId);
        return view("admin.apply.form", compact('job'));
    }

    public function submitForm(Request $request, $jobId)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'cover_letter' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'skills' => 'required',
        ]);

        Applicant::create([
            'job_id' => $jobId,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'linkedin' => $request->linkedin,
            'education' => $request->education,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'cover_letter' => $request->cover_letter,
        ]);

        return redirect()->back()->with('success', 'Application submitted.');
    }

    public function viewApplicants($jobId)
{
    $job = Job::findOrFail($jobId);
    $applicants = Applicant::where('job_id', $jobId)->latest()->get();

    return view('admin.jobs.applicants', compact('job', 'applicants'));
}

public function index()
{
    $applicants = Applicant::latest()->get(); // Soo qaado dhammaan codsadayaasha ugu dambeeyay
    return view('admin.applicants.index', compact('applicants'));
}




}
