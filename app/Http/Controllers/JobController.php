<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Job;
use \App\Models\JobType;
use \App\Models\JobDegree;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with(['type','degree'])->whereNotNull('approved_at')->orderBy('created_at', 'desc')->paginate(10);
        // dd($jobs);
        return view('pages.job.index', [
            'jobs' => $jobs,
            'title' => 'รายการงานล่าสุด'
        ]);
    }

    public function view_by_job_type(JobType $type)
    {
        $title_page = 'ค้นหางานตามประเภทของงาน';

        if(!$type->id) {
            $jobs = null;
        } else {
            $jobs = Job::with(['type','degree'])->whereNotNull('approved_at')->where('job_type', $type->id)->orderBy('created_at', 'desc')->paginate(10);
            $title_page .= ' - ค้นหาจากประเภท: '.$type->name;
        }
        // dd($type);
        
        return view('pages.job.search', [
            'jobs' => $jobs,
            'searchs' => JobType::orderBy('id', 'asc')->get(),
            'current_search' => $type,
            'title' => $title_page,
            'search_type' => (object) [
                'name' => 'type',
                'url' => 'job.by_type'
            ]
        ]);
    }

    public function view_by_job_degree(JobDegree $degree)
    {
        $title_page = 'ค้นหางานตามวุฒิการศึกษา';

        if(!$degree->id) {
            $jobs = null;
        } else {
            $jobs = Job::with(['type','degree'])->whereNotNull('approved_at')->where('job_degree', $degree->id)->orderBy('created_at', 'desc')->paginate(10);
            $title_page .= ' - ค้นหาจากวุฒิ: '.$degree->name;
        }
        // dd($jobs);
        return view('pages.job.search', [
            'jobs' => $jobs,
            'searchs' => JobDegree::orderBy('id', 'asc')->get(),
            'current_search' => $degree,
            'title' => $title_page,
            'search_type' => (object) [
                'name' => 'degree',
                'url' => 'job.by_degree'
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo '-- form add coming soon..';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        if(!isset($job->approved_at)) {
            return abort(403);
        }

        return view('pages.job.detail', [
            'job' => $job,
            'related_job' => Job::with(['type','degree'])->whereNotNull('approved_at')->where('id', '!=', $job->id)->where('job_degree', $job->job_degree)->where('job_type', $job->job_type)->limit(5)->paginate(5),
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
