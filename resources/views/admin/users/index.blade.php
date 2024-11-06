@extends('admin.layout')
@section('title')
    Admin
@endsection
@section('content')
    <div class="w-full ">
        <h1 class="alert alert-secondary">User</h1>
        @if (session('message'))
            <div class="alert alert-primary">
                {{ session('message') }}
            </div>
        @endif
        @if (session('messagee'))
            <div class="alert alert-danger">
                {{ session('messagee') }}
            </div>
        @endif
        <br>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary" style="width: 100px; text-align: center">Add New</a>
        <hr>
        <!-- Form tìm kiếm -->
        <form action="{{ route('admin.users.index') }}" method="GET" style=" display: flex; gap: 15px">

            <div class="col-auto">
                <input type="text" name="query" class="form-control" style="width: 500px;"
                    placeholder="Tìm kiếm user..." required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Tìm</button>
                <a href="{{ route('admin.users.index') }}" name="comeBack" class="btn btn-success">DANH SÁCH</a>
            </div>
        </form><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>fullname</th>
                    <th>username</th>
                    <th>email</th>
                    <th class="">password</th>
                    <th>avatar</th>
                    <th>role</th>
                    <th>active</th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Str::limit($user->password, 6, '...') }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $user->avatar }}" width="60" alt="">
                        </td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->active }}</td>
                        <td>
                            <div class="d-flex gap-1 ">

                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mx-1 d-inline-block" >Edit</a>
                                @if (Auth::user()->id != $user->id)
                                <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn có muốn xóa không')"
                                        class="btn btn-danger">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
