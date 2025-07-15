<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

       public function index()
    {
        $totalJobs = Job::count();
        $totalApplicants = Applicant::count();
        $openJobs = Job::where('deadline', '>', now())->count();

        // Haddii aad leedahay status ku saabsan applicants pending, isticmaal, haddii kale ka saar
        // $pendingApplicants = Applicant::where('status', 'pending')->count();

        $latestJobs = Job::withCount('applicants')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view("admin.Dashboard.dashboard", compact(
            'totalJobs',
            'totalApplicants',
            'openJobs',
            // 'pendingApplicants',
            'latestJobs'
        ));
    }
}


