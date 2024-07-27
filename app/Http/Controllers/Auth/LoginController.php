<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {

    }


    public function show()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];    //Lấy mảng credential gồm email và password của người dùng đăng nhập

        if (Auth::attempt($credentials)) {      //Auth::attempt => Xác thực thông tin từ mảng người dùng nhập với db
            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
        }
        return redirect()->route('login')->with('error', 'Email hoặc Mật khẩu không chính xác');
    }

    public function logout(Request $request){
        Auth::logout();   //Đăng xuất người dùng hiện tại, xóa thông tin xác thực người dùng
        $request->session()->invalidate();     //Hủy session hiện tại của người dùng, xóa tất cả dữ liệu bao gồm ttdangnhap
        $request->session()->regenerateToken();         //Tái tạo CSRF mới cho Token
        return redirect()->route('home.index')->with('success', 'Đăng xuất thành công');
    }
}
