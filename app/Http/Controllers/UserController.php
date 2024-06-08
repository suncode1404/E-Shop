<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function infoUser()
    {
        $user = User::where('id', Auth::id())->get()->first();
        return view('client.form.info_content.infoUser', compact('user'));
    }
    public function updateInfoUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Update the user's information and set the updated_at timestamp to the current time in Vietnam timezone
        User::whereId(Auth::id())->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        toast('Bạn đã sửa tài khoản thành công', 'success');
        return redirect()->route('client.user.info');
    }
    public function resetPassword()
    {
        return view('client.form.info_content.resetPassword');
    }
    public function updateResetPassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed',
        ]);

        // Update the user's information and set the updated_at timestamp to the current time in Vietnam timezone
        User::whereId(Auth::id())->update([
            'password' => Hash::make($validatedData['password']),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        toast('Bạn đã đổi mật khẩu thành công', 'success');
        return redirect()->route('client.user.resetPassword');
    }
}
