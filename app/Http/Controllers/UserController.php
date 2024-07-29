<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function getData()
    {
        $users = User::select('id', 'fullname', 'username', 'email', 'position', 'dept', 'role')->get();

        return datatables()->of($users)->toJson();
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'position' => 'required|string',
            'dept' => 'required|string',
            'role' => 'required|string',
        ]);

        // Create user
        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>$request->password,
            'position' =>$request->position,
            'dept' =>$request->dept,
            'role' => $request->role,
        ]);

        // Redirect after successful creation
        return redirect('/users')->with('success', 'User created successfully');
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'position' => 'required|string|max:255',
            'dept' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
        public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user'); // Default role is 'user'
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }

}
