<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserFormRequest;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function login(){
        return view('login',[
            'title' => 'Trang đăng nhập hoặc đăng ký'
        ]);
    }
    public function sign_up(UserFormRequest $request){
        
        User::create([
            'full_name' => $request->fullname,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 1
        ]);
        session()->flash('success', 'Tạo tài khoản thành công!');
        return redirect()->back();
    }
    public function sign_in(Request $request){
        if(Auth::attempt(['username' => $request->username,'password' => $request->password]) || 
        Auth::attempt(['email' => $request->username,'password' => $request->password])){
            return redirect('/');
        }
        session()->flash('error', 'Thông tin tài khoản hoặc mật khẩu không chính xác!');
        return redirect('login');
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    function user_info(){
        $user = User::find(Auth::user()->id);
        return view('admin.users.infomation',[
            'title' => 'User Profile',
            'user' => $user
        ]);
    }

    function update_info(Request $request){
        $user = User::find(Auth::user()->id);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->save();
        session()->flash('success', 'Thay đổi thông tin thành công!');
        return redirect('user-info');
    }

    public function change_password(Request $request){
        $user = User::find(Auth::user()->id);
        if($user && Hash::check($request->current_password, $user->password)){
            $user->password = $request->new_password;
            $user->save();
            session()->flash('success','Đổi mật khẩu thành công!');
            return redirect('user-info');
        }
        session()->flash('error', 'Mật khẩu cũ không đúng! Vui lòng kiểm tra lại!');
        return redirect()->back();   
    }

    //User Administration
    public function show(){
        $users = User::orderBy('id')->paginate(10);
        return view('admin.users.show', [
            'title' => 'List Users',
            'users' => $users
        ]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'error' => false,
            'message' => 'User has been successfully deleted!'
        ]);
    }
}
