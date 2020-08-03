<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // function __construct()
    // {
    //      $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:user-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        $roles = Role::pluck('name','name')->all();
        $users = User::orderBy('id','ASC')->get();
        return view('users.index',compact('users', 'roles'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all(); //lay tat ca ten o cot name
        return view('users.create',compact('roles'));
    }

    public function uploadImage(Request $request)
    {
        $user =User::find(Auth::user()->id);
        if($request->ajax())
        {
            if($request->upload_image)
            {
                $data = $request->upload_image;
                $image_array_1 = explode(";", $data);
                $image_array_2 = explode(",", $image_array_1[1]);
                $data = base64_decode($image_array_2[1]);
                $imageName = time() . '.png';
                $path = 'upload/avatar/'.$imageName;
                file_put_contents($path, $data);
            }
            $user->avatar = $imageName;
            $user->save();
        }
        return response()->json($imageName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(AddUserRequest $request)
    {
        $validated = $request->validated();
        $input = $request->all(); //khai bao tat ca cac truong trong csdl o user.php fillable
        $phone = substr($input['so_dien_thoai'], 0, 1);
        if($phone != '0')
        {
            $notification = array(
                'message' => 'Số điện thoại phải bắt đầu bằng số 0', 
                'alert-type' => 'error'
            );
            return back()->with($notification);

        }
        $input['password'] = Hash::make($input['password']); //ma hoa password

        if($request->gioi_tinh == 1)
        {
            $file_name = 'avatar_male.png';
            $random_file_name = str_random(4).'_'.$file_name;
            $input['avatar'] = $file_name;
        }
        else
        {
            $file_name = 'avatar_female.png';
            $random_file_name = str_random(4).'_'.$file_name;
            $input['avatar'] = $file_name;
        }
        

        $user = User::create($input);
        $user->assignRole($request->input('roles')); //chon quyen cho user

        $notification = array(
            'message' => 'Tạo tài khoản người dùng thành công', 
            'alert-type' => 'success'
          );

        return redirect()->route('users.index')
                        ->with($notification); //xuat thong bao ra ngoai man hinh
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.index',compact('user', 'roles', 'userRole'));
    }

    public function showUserInRole(Request $request)
    {
        if($request->ajax())
        {
            $user = User::find($request->id);
            $userRole = $user->roles->pluck('name', 'name')->all();
            return response()->json($userRole);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id_user);
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id_user,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension(); //lay duoi file
            if($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg'){

            }
            else
                return redirect()->back()->with('errror', 'Hệ thống chưa hỗ trợ định dạng file mới upload!');
            $file_name = $file->getClientOriginalName();
            $random_file_name = str_random(4).'_'.$file_name;
            while(file_exists('upload/avatar/'.$random_file_name)){
                $random_file_name = str_random(4).'_'.$file_name; 
            }
            $file->move('upload/avatar',$random_file_name);
            $input['avatar'] = $random_file_name;
        }
        
        else $input['avatar']= $user->avatar;
        
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$request->id_user)->delete();
        $user->assignRole($request->input('roles'));

        $notification = array(
            'message' => 'Cập nhật tài khoản người dùng thành công', 
            'alert-type' => 'info'
          );

        return redirect()->route('users.index')
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
        $user = User::findOrFail($request->id_user);
        $user->delete();
        $notification = array(
            'message' => 'Xóa tài khoản người dùng thành công', 
            'alert-type' => 'warning'
          );
        return redirect()->route('users.index')
                        ->with($notification);
    }
}
