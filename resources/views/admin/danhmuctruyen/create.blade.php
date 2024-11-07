@extends('admin.layout')
@section('title')
    Thêm danh mục
@endsection
@section('content')
    <div class="w-full">
        <h1 class="alert alert-secondary">Thêm danh mục truyện</h1>
        <form action="{{ route('admin.danhmuc.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session('message'))
                <div class="alert alert-primary">
                    {{ session('message') }}
                </div>
            @endif
            <!-- Tên danh mục -->
            <div class="mb-3">
                <label for="tendm" class="form-label">Tên danh mục</label>
                <input type="text" name="tendm" id="tendm" class="form-control" placeholder="Tên danh mục.....">
                @error('tendm')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mô tả danh mục -->
            <div class="mb-3">
                <label for="mota" class="form-label">Mô tả danh mục</label>
                <input type="text" name="mota" class="form-control" id="mota" placeholder="Mô tả danh mục....">
                @error('mota')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Kích hoạt</label>
                <select class="form-select" name="kichhoat" required>
                    <option value="0" selected>Kích hoạt</option>
                    <option value="1">Không Kích hoạt</option>
                </select>
            </div>


            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add new</button>
            </div>
        </form>
    </div>
@endsection
