<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Chucdanh;
use App\Http\Requests\AddPositionRequest;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Chucdanh::orderBy('id', 'ASC')->get();
        return view('positions.index', ['positions' => $positions])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPositionRequest $request)
    {
        $validated = $request->validated();
        $input = $request->all();
        $position = Chucdanh::create($input);
        return redirect()->route('positions.index')
                        ->with('success', 'Position created successfully');
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
        $position = Chucdanh::findOrFail($request->id_position);
        $input = $request->all();
        $position->update($input);
        return redirect()->route('positions.index')
                        ->with('success','Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $position = Chucdanh::findOrFail($request->id_position);
        $position->delete();
        return redirect()->route('positions.index')
                        ->with('success','Position deleted successfully');
    }
}
