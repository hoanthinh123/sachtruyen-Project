<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->only(['username', 'password']);

        //Đăng nhập.
         $user = User::where('username', $data['username'])->first();
        if ($user && !$user->active) {
            return redirect()->back()->with('messageerr', 'Tài khoản này đã ngưng hoạt động!');
        }
        if (Auth::attempt($data)) {
            
            return redirect()->route('admin.users.home');
        } else {
            return redirect()->back()->with('message', 'Username hoặc Password không đúng!');
        }
       
    
    }
    public function getRegister()
    {
        return view('register');
    }
    public function postRegister(Request $request)
    {
        $data = $request->validate([
            'fullname' => ['required', 'min:3'],
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5'],
            'confirm_password' => ['required', 'same:password'],
            'avatar'=> ['required','mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        $data = $request->except('avatar');

        // Kiểm tra xem có file hình ảnh không
        if ($request->hasFile('avatar')) {
            // Lưu file hình ảnh vào thư mục 'products' và lưu đường dẫn vào mảng $data
            $files_avatars = $request->file('avatar')->store('avatars');
            $data['avatar'] = $files_avatars;
                        // $data['image'] = $request->file('image')->store('products', 'public');
        }
        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký thành công');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.home');
    }
}
