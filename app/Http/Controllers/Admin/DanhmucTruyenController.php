<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhmucTruyen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DanhmucTruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = $request->input("query");
        if ($query) {
            $danhmucs = DanhmucTruyen::where("tendm", "like", "%" . $query . "%")->paginate(5);
        } else {
            $danhmucs =  DanhmucTruyen::query()->orderBy("id", "desc")->paginate(10);
        }
        return view('admin.danhmuctruyen.index', compact('danhmucs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.danhmuctruyen.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DanhmucTruyen $DanhmucTruyen)
    {
        //
        $data = $request->validate([
            'tendm' => ['required', 'unique:danhmuc', 'string', 'max:255'],
            'mota' => ['required', 'string', 'max:255'],
            'kichhoat' => ['required'],
        ]);
        DanhmucTruyen::query()->create($data);

        return redirect()->route('admin.danhmuc.index')->with('message', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DanhmucTruyen $danhmuc)
    {
        return view('admin.danhmuctruyen.edit', compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DanhmucTruyen $danhmuc)
    {
        //
        $data = $request->validate([
            'tendm' => ['required', Rule::unique('danhmuc')->ignore($danhmuc), 'string', 'max:255'],
            'mota' => ['required', 'string', 'max:255'],
            'kichhoat' => ['required'],
        ]);
        $danhmuc->update($data);
        return redirect()->route('admin.danhmuc.index')->with('message', 'Cập nhập thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhmucTruyen $Danhmuc)
    {
        $Danhmuc->delete();
        return redirect()->back()->with('messagee', 'Xóa thành công');
    }
}
