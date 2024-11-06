@extends('admin.layout')
@section('title')
    Admin
@endsection
@section('content')
<div class="card-body">
    <h1 class="text-center">Thêm mới user</h1>

    <form action="{{ route('admin.users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Full Name -->
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" name="fullname" id="" class="form-control" placeholder="Enter your fullname">
        </div>
        @error('fullname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username"
                placeholder="Enter your username">
        </div>
        @error('username')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email"
                placeholder="Enter your email">
        </div>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- avata -->
        <div class="mb-3">
            <label for="avatar" class="form-label">Avata</label>
            <input type="file" name="avatar" class="form-control" 
                placeholder="Enter your avatar">
        </div>
        @error('avatar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password"
                placeholder="Enter your password">
        </div>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" id="confirmPassword"
                placeholder="Confirm your password">
        </div>
        @error('confirm_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role" id="role" name="role" required>
                <option value="user" selected>User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <!-- Active Status -->
        <div class="mb-3">
            <label class="form-label">Active Status</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="active" id="active_yes" value="1">
                <label class="form-check-label" for="active_yes">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="active" id="active_no" value="0" checked>
                <label class="form-check-label" for="active_no">Inactive</label>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Add new</button>
        </div>
    </form>
</div>
@endsection