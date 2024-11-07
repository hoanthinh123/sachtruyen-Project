@extends('admin.layout')
@section('title')
    Danh mục truyện
@endsection
@section('content')
    <div class="w-full ">
        <h1 class="alert alert-secondary">Liệt kê danh mục truyện</h1><br>
        <a href="{{ route('admin.danhmuc.create') }}" class="btn btn-primary">Thêm mới</a>
        <hr>
        <!-- Form tìm kiếm -->
        <form action="{{ route('admin.danhmuc.index') }}" method="GET" style=" display: flex; gap: 15px">

            <div class="col-auto">
                <input type="text" name="query" class="form-control" style="width: 500px;" placeholder="Tìm kiếm danh mục truyện..."
                    required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Tìm</button>
                <a href="{{ route('admin.danhmuc.index') }}" name="comeBack" class="btn btn-success">DANH SÁCH</a>
            </div>
        </form><br>
        @if (session('messagee'))
            <div class="alert alert-danger">
                {{ session('messagee') }}
            </div>
        @endif
        @if (session('message'))
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
    @endif
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Mô tả</th>
                    <th>Hoạt động</th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($danhmucs as $danhmuc)
                    <tr>
                        <td>{{ $danhmuc->id }}</td>
                        <td>{{ $danhmuc->tendm }}</td>
                        <td>{{ $danhmuc->mota }}</td>
                        <td>
                            @if($danhmuc->kichhoat==0)
                            <span class="text-success">Kích hoạt</span>
                            @else
                            <span class="text-danger">Không Kích hoạt</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1 ">
                                <a href="{{ route('admin.danhmuc.edit', $danhmuc) }}"
                                    class="btn btn-primary mx-1 d-inline-block">Edit</a>
                                <form action="{{ route('admin.danhmuc.destroy', $danhmuc) }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn có muốn xóa không')"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $danhmucs->links() }}
    </div>
@endsection
