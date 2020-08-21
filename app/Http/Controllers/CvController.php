<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('id', 'ASC')->get();
        return view('cv.index', ['jobs' => $jobs])
                ->with('i');
    }

    public function showList($ma_job)
    {
        $job = Job::where('ma_job', 'LIKE', $ma_job)->first();
        $cvs = Cv::where('id_job', $job->id)->get();
        return view('cv.show_list', ['job' => $job, 'cvs' => $cvs]);
    }

    public function showDetail($id)
    {
        $cv = Cv::where('id', $id)->first();
        return view('cv.detail', ['cv'=> $cv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
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
