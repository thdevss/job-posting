<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Job;
use \App\Models\JobType;
use \App\Models\JobDegree;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with(['type','degree'])->orderBy('created_at', 'desc')->paginate(10);
        // dd($jobs);
        return view('pages.admin.job', [
            'jobs' => $jobs,
            'title' => 'รายการงานล่าสุด'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
        // dd($job);
        return view('pages.job.detail', [
            'job' => $job,
            'related_job' => Job::with(['type','degree'])->where('id', '!=', $job->id)->where('job_degree', $job->job_degree)->where('job_type', $job->job_type)->limit(5)->paginate(5),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
