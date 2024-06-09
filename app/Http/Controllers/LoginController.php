<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('client.form.login');
    }

    //This method will authenticate user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!$validator->passes()) {
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'user') {
                //Lấy thông tin tài khoản đã xác thực
                $user = Auth::user();
                toast('Chào mừng,' . $user->name, 'success');
                return redirect()->route('client.home');
            }else {
                $admin = Auth::user();
                toast('Chào mừng,' . $admin->name, 'success');
                return redirect()->route('admin.dashboard');
            }
        } else {
            toast('Sai email hoặc mật khẩu', 'error');
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }
    }
    public function register()
    {
        return view('client.form.register');
    }
    public function processRegister(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();
        toast('Bạn đã đăng ký tài khoản thành công', 'success');
        return redirect()->route('account.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->flush();
        return redirect()->route('account.login');
    }
}
