<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Job;
use \App\Models\JobType;
use \App\Models\JobDegree;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = 'all')
    {
        if($type == 'wait_approve') {
            $jobs = Job::with(['type','degree'])->whereNull('approved_at')->orderBy('created_at', 'desc')->paginate(10);
            $title = 'รายการงานรออนุมัติ';
        } else {
            $jobs = Job::with(['type','degree'])->whereNotNull('approved_at')->orderBy('created_at', 'desc')->paginate(10);
            $title = 'รายการงานทั้งหมด';

        }
        // dd($jobs);
        return view('pages.admin.job', [
            'jobs' => $jobs,
            'title' => $title,
            'type' => $type
        ]);
    }

    public function wait_approve()
    {
        return $this->index('wait_approve');
    }

    public function ajax_count_wait_approve()
    {
        return [
            'payload' => [
                'count' => Job::whereNull('approved_at')->count()
            ]
        ];
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
        if($request->action === 'approve_job') {
            $job = Job::find($id);
            $job->approved_at = date('Y-m-d H:i:s');
            $job->save();
            return redirect()->back()->with('message', 'Approved Succeed');
        } else {
            // update something
        }
        
    }

    public function bulk_update(Request $request)
    {
        $validated = request()->validate([
            'job.*.id' => ['required', Rule::exists('jobs', 'id')],
            'action' => ['required']
        ]);
    
        $input = Collection::make($validated['job']);
        $action = $request->action;

        Job::query()->whereKey($input->pluck('id'))
            ->each(function (Job $job) use ($input, $action) {

                if($action === 'approve_job') {
                    $job->approved_at = date('Y-m-d H:i:s');
                    $job->save();
                } else if ($action === 'delete') {
                    $job->delete();
                }

            });

        $alert_message = 'Approved (selected) Succeed';
        if($action === 'delete') {
            $alert_message = 'Deleted (selected) Succeed';
        }
        return redirect()->back()->with('message', $alert_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
        $job->delete();
        return redirect()->back()->with('message', 'Deleted (selected) Succeed');
    }
}
