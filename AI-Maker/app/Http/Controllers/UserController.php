<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Plan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const VALIDATION_RULES = [
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'plan_id' => 'nullable|integer',
        'profile_picture' => 'nullable|string',
        'roles' => 'required|array',
        'roles.*' => 'exists:roles,id',
    ];

    public function index(Request $request)
    {
        $users = User::with('roles', 'plan')->paginate(10);
        $roles = Role::all();
        $plans = Plan::all();

        if ($request->ajax()) {
            return view('admin_popups.user.table', compact('users', 'roles', 'plans'))->render();
        }

        return view('admin_popups.user.index', compact('users', 'roles', 'plans'));
    }

    public function create()
    {
        $roles = Role::all();
        $plans = Plan::all();
        return view('admin_popups.user.create', compact('roles', 'plans'));
    }

    public function store(Request $request)
    {
        $request->validate(self::VALIDATION_RULES);
        User::adminCreateUser($request->all());
        return redirect()->route('admin_popups.user.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::with('roles', 'plan')->findOrFail($id);
        return view('admin_popups.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::with('roles', 'plan')->findOrFail($id);
        $roles = Role::all();
        $plans = Plan::all();
        return view('admin_popups.user.edit', compact('user', 'roles', 'plans'));
    }

    public function update(Request $request, $id)
    {
        $rules = self::VALIDATION_RULES;
        $rules['email'] .= ',email,' . $id;
        $request->validate($rules);

        $user = User::findOrFail($id);
        $user->updateUser($request->all());

        return redirect()->route('admin_popups.user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->deleteUser();

        return redirect()->route('admin_popups.user.index')->with('success', 'User deleted successfully.');
    }
}
