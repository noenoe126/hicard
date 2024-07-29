@extends('layouts.app-master')

@section('content')
    <div class="container">
        <h2>Edit User</h2>
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

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="fullname">Name</label>
                <input id="fullname" type="text" name="fullname" value="{{ old('fullname', $user->fullname) }}" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input id="position" type="text" name="position" value="{{ old('position', $user->position) }}" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="dept">Department</label>
                <input id="dept" type="text" name="dept" value="{{ old('dept', $user->dept) }}" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-info">Update User</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
