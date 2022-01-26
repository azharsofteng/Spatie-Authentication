@extends('layouts.master')
@section('content')
<main class="my-2 mx-4">
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <h4>+ Add new user</h4>
        <hr class="m-0">
        <div class="form-group row mt-2">
            <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
                <label for="">E-mail</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="col-md-6">
                <label for="">UserName</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
            </div>
            <div class="col-md-6">
                <label for="">Role</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">---select one---</option>
                    @foreach ($roles as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>
        </div>
        <hr class="m-0">
        <button type="submit" class="btn btn-info mt-2">Save</button>
    </form>

    <table class="table table-bordered table-hover mt-4">
        <thead>
            <tr>
                <th colspan="5" class="bg-dark text-white ">All User List</th>
            </tr>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->username }}</td>
                <td>
                    <a href="" class="btn btn-info btn-sm">set role</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection