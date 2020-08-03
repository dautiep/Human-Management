<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProjectRequest;
use Illuminate\Support\Carbon;
use App\Duan;
use App\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Duan::orderBy('id', 'ASC')->get();
        return view('projects.index', ['projects' => $projects])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Nguoi quan tri');
            }
        )->get();
        return view('projects.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(AddProjectRequest $request)
    {
        $validated = $request->validated();
        $input = $request->all();
        $start_date = Carbon::create($request->thoigian_batdau);
        $end_date = Carbon::create($request->thoigian_ketthuc);
        if($start_date < Carbon::now()->subDay()){
            $notification = array(
                'message' => 'Thời gian bắt đầu nhỏ hơn ngày hiện tại!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }else
        {
            $input['thoigian_batdau'] = $start_date->toDateString();
            if($start_date->diffInDays($end_date, false) < 729)
            {
                $notification = array(
                    'message' => 'Thời gian tối thiểu của dự án là 2 năm!',
                    'alert-type' => 'error'
                );
                return back()->with($notification); 
            }
            else
            {
                $input['thoigian_ketthuc'] = $end_date->toDateString();
                $input['slug'] = $this->bo_dau_vn($request->ten_du_an);
        
                $project = Duan::create($input);
                $notification = array(
                    'message' => 'Tạo dự án thành công',
                    'alert-type' => 'success'
                );
                return redirect()->route('projects.index')
                    ->with($notification);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Duan::where('slug', 'LIKE', "{$slug}")->first();
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Nguoi quan tri');
            }
        )->get();
        $project = Duan::where('slug', 'LIKE', "{$slug}")->first();
        return view('projects.edit', ['project' => $project, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $project = Duan::where('slug', 'LIKE', "{$slug}")->first();
        $input = $request->all();
        $input['thoigian_batdau'] = date_format(date_create($request->thoigian_batdau), "Y/m/d");
        $input['thoigian_ketthuc'] = date_format(date_create($request->thoigian_ketthuc), "Y/m/d");
        $project->update($input);
        $notification = array(
            'message' => 'Cập nhật dự án thành công',
            'alert-type' => 'info'
        );
        return redirect()->route('projects.index')
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
        $project = Duan::where('slug', 'LIKE', "{$request->slug_project}")->first();
        $project->delete();
        $notification = array(
            'message' => 'Xóa dự án thành công',
            'alert-type' => 'warning'
        );
        return redirect()->route('projects.index')
            ->with($notification);
    }

    public function bo_dau_vn($str)
    {

        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd' => 'đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D' => 'Đ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ', '_', $str);
        $str = strtolower($str);
        return $str;
    }
}
