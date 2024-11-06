<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function home(){
       
        return view('admin.users.home');
    }
    public function index(Request $request)
    {
        $query = $request->input("query");
        if ($query) {
            $users = User::where("fullname", "like", "%" . $query . "%")->paginate(5);
        } else {
            $users = User::paginate(10);
        }
        $index = 1;
        return view("admin.users.index", compact("users", "index"));
    }
    public function create()
    {
        return view("admin.users.create");
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => ['required', 'min:3'],
            'username' => ['required', 'min:3','unique:users' ],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5'],
            'confirm_password' => ['required', 'same:password'],
            'avatar' => ['required', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'role' => ['required', 'in:user,admin'],  // Thêm vai trò: user, admin
            'active' => ['required', 'boolean'],      // Thêm trạng thái kích hoạt
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
        return redirect()->route('admin.users.index')->with('message', 'Đăng ký thành công');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'fullname' => ['required', 'min:3'],
            'username' => ['required', 'min:3', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'min:5'],
            'confirm_password' => ['required', 'same:password'],
            'avatar' => ['mimes:jpeg,png,jpg,gif', 'max:2048'],
            'role' => ['required', 'in:user,admin'],  // Thêm vai trò: user, admin
            'active' => ['required', 'boolean'],      // Thêm trạng thái kích hoạt
        ]);
        $data = $request->except('avatar');
        $avatar_old = $user->avatar;
        $data['avatar'] = $avatar_old;
        // Kiểm tra xem có file hình ảnh không
        if ($request->hasFile('avatar')) {
            // Lưu file hình ảnh vào thư mục 'products' và lưu đường dẫn vào mảng $data
            $files_avatars = $request->file('avatar')->store('avatars');
            $data['avatar'] = $files_avatars;
            // $data['image'] = $request->file('image')->store('products', 'public');
        }
        $user->update($data);
        return redirect()->route('admin.users.index')->with('message', 'Cập nhập thành công');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with("messagee", "Xóa thành công");
    }
}
