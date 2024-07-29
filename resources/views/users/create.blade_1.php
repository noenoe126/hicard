@extends('layouts.app-master')

@section('content')
    <div class="container">
        <h2>Create User</h2>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="form-group">
                <label for="fullname">Name</label>
                <input id="fullname" type="text" name="fullname" value="{{ old('fullname') }}" class="form-control" autocomplete="off" required>

            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input id="position" type="text" name="position" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="dept">Department</label>
                <input id="dept" type="text" name="dept" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="uer">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-info">Create User</button>
        </form>
    </div>
@endsection
