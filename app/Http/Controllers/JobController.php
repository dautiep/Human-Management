<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Http\Requests\AddJobRequest;
use App\Job;
use App\User;
use App\Duan;
use App\Chucdanh;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('id', 'ASC')->get();
        return view('jobs.index', ['jobs' => $jobs])
                ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Chucdanh::orderBy('id', 'ASC')->get();
        $users = User::orderBy('id', 'ASC')->get();
        $projects = Duan::orderBy('id', 'ASC')->get();
        return view('jobs.create', ['users' => $users, 'projects' => $projects, 
                                    'positions' => $positions
                                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddJobRequest $request)
    {
        $validated = $request->validated();
        $input = $request->all();
        $job = Job::create($input);
        return redirect()->route('jobs.index')
                        ->with('success', 'Job created successfully');
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
