@extends('admin.layout')
@section('title')
    Admin
@endsection
@section('content')
    <!-- Dashboard Content -->
    <div class="container mt-4">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>This is where you can manage your website's content, users, and settings.</p>

        <!-- Cards Row -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Manage users and permissions.</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go to Users</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Manage Product</p>
                        <a href="" class="btn btn-primary">Go to Settings</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category</h5>
                        <p class="card-text"> Manage Category.</p>
                        <a href="" class="btn btn-primary">Go to Category</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
  
@endsection
