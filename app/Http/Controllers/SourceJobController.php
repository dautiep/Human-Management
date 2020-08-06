<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Nguonjob;
use Illuminate\Http\Request;

class SourceJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Nguonjob::orderBy('id', 'ASC')->get();
        return view('source_job.index', ['sources' => $sources])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('source_job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ten_nguonjob' => 'required|unique:nguonjob,ten_nguonjob,'
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_nguonjob' => 'Tên nguồn job',
        ]);
        $input = $request->all();
        $source = Nguonjob::create($input);
        $notification = array(
            'message' => 'Tạo nguồn job thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('sources-job.index')
                        ->with($notification);
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
        $source = Nguonjob::findOrFail($request->id_source);
        $this->validate($request, [
            'ten_nguonjob' => 'required|unique:nguonjob,ten_nguonjob,'.$request->id_source,
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_nguonjob' => 'Tên nguồn job',
        ]);
        $input = $request->all();
        $source->update($input);
        $notification = array(
            'message' => 'Cập nhật nguồn job thành công', 
            'alert-type' => 'info'
            );
        return redirect()->route('sources-job.index')
                        ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $source = Nguonjob::findOrFail($request->id_source);
        $source->delete();
        $notification = array(
            'message' => 'Xóa nguồn job thành công', 
            'alert-type' => 'warning'
            );
        return redirect()->route('sources-job.index')
                        ->with($notification);
    }
}
