<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Job;
use \App\Models\JobType;
use \App\Models\JobDegree;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class AdminDashboardController extends Controller
{
    /**
     * Display a dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = 'all')
    {
        $job = [
            'wait_approve' => 0,
            'in_today' => 0,
            'total' => 0
        ];

        $job['wait_approve'] = Job::whereNull('approved_at')->count();
        $job['in_today'] = Job::where(Job::raw('DATE(created_at)'), date('Y-m-d'))->count();
        $job['total'] = Job::count();

        

        // dd($jobs);
        return view('pages.admin.dashboard', [
            'stats' => [
                'job' => $job
            ]
        ]);

    }

}
